CREATE VIEW ViewRelationDetail AS (
	SELECT 
		Employee.SIN as ParentSIN,
		(CASE Employee.gender WHEN 'F' THEN 'Mother' ELSE 'Father' END) AS Parent,
		Employee.name as ParentName,
		Dependent.SIN as ChildSIN,
		(CASE Dependent.gender WHEN 'F' THEN 'Daughter' ELSE 'Son' END) AS Child,
		Dependent.name as ChildName
	FROM Employee, Dependency, Dependent
	WHERE Employee.SIN = Dependency.employeeSIN AND Dependent.SIN = Dependency.dependentSIN
);

CREATE VIEW ViewProjectDetail AS(
	SELECT 
		Project.PID,
		Project.PName,
		Project.location,
		Project.stage,
		Employee.SIN,
		Employee.name as LeaderName,
		Department.DNumber as DepartmentID,
		Department.DName as DepartmentName
	FROM Project, LedBy, Employee, BelongsTo, Department
	WHERE 
		Project.PID = LedBy.PID AND Employee.SIN = LedBy.SIN AND
		Employee.SIN = BelongsTo.SIN AND Department.DNumber = BelongsTo.DNumber
);