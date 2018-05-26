https://drive.google.com/file/d/1Pz2HZIq0MlVlQ2x2bQWDZiLLC_jcF_XH/view?usp=sharing


Relation Schemas:

Entity sets:
- Employee (SIN, name, birthday, gender, address, phoneNo, salary)
  - {{SIN}->{name, birthday, gender, address, phoneNo, salary}}
- Department (DNumber, DName)
  - {{DNumber}->{DName}}
- Project (PID, PName, location, stage)
  - {{PID}->{location, stage}}
- Dependent (SIN, name, gender, birthday)
  - {{SIN}->{name, gender, birthday}}

Relations:
- BelongsTo (SIN, DNumber)
  - {{SIN}->{DNumber}}
- ManagedBy (DNumber, SIN, startDate)
  - {{DNumber, SIN}->{startDate}}
- Dependency (employeeSIN, dependentSIN)
  - Assumption: 1) it’s possible for both of the parents to work in the company. 2) One employee may have several dependents.
- WorksFor (SIN, PID, hour, startDate, endDate)
  - Assumption: one employee can only work for one project in a day
  - {{SIN, PID, startDate}->{hour, endDate}}
- LedBy (PID, SIN)
  - {{PID}->{SIN}}
- Supervise (supervisorSIN, subordinateSIN) 
  - {{subordinateSIN}->{supervisorSIN}}
