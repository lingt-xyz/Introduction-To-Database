CREATE TABLE Employee (
  SIN INTEGER PRIMARY KEY,
  name VARCHAR (20) NOT NULL,
  birthday DATE,
  gender CHAR(1) CHECK (gender IN ('F', 'M')),
  address VARCHAR (50),
  phoneNo VARCHAR (10),
  salary FLOAT
);

CREATE TABLE Department (
  DNumber INTEGER PRIMARY KEY,
  DName VARCHAR (100) UNIQUE
);

CREATE TABLE Project (
  PID INTEGER PRIMARY KEY,
  PName VARCHAR (20) UNIQUE,
  location VARCHAR (20),
  stage VARCHAR (30) CHECK (stage IN ('preliminary', 'intermediate', 'advanced', 'complete'))
);

CREATE TABLE Dependent (
  SIN INTEGER PRIMARY KEY,
  name VARCHAR (20) NOT NULL,
  birthday DATE,
  gender CHAR(1) CHECK (gender IN ('F', 'M'))
);

CREATE TABLE BelongsTo(
  SIN INTEGER PRIMARY KEY REFERENCES Employee(SIN),
  DNumber INTEGER REFERENCES Department(DNumber)
);

CREATE TABLE Dependency (
  employeeSIN INTEGER REFERENCES Employee(SIN),
  dependentSIN INTEGER REFERENCES Dependent(SIN),
  relationship VARCHAR (30) CHECK (relationship IN ('spouse', 'parent-child')),
  PRIMARY KEY (employeeSIN, dependentSIN)
);

CREATE TABLE WorksFor (
  SIN INTEGER REFERENCES Employee(SIN),
  PID INTEGER REFERENCES Project(PID),
  hour INTEGER,
  startDate DATE,
  endDate DATE,
  PRIMARY KEY (SIN, PID, startDate)
);

CREATE TABLE LedBy(
  PID INTEGER PRIMARY KEY REFERENCES Project(PID),
  SIN INTEGER REFERENCES Employee(SIN)
);

CREATE TABLE Supervise(
  supervisorSIN INTEGER REFERENCES Employee(SIN),
  subordinateSIN INTEGER REFERENCES Employee(SIN),
  PRIMARY KEY (subordinateSIN)
);

CREATE TABLE ManagedBy (
  DNumber INTEGER REFERENCES Department(DNumber),
  SIN INTEGER,
  startDate DATE,
  PRIMARY KEY (DNumber,SIN)
);

//SIN is not referencing the Employee table, cuz it's possible that we still want
//to keep the record of management information even if the manager left the company
