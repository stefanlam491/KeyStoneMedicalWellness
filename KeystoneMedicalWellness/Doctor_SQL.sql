CREATE  DATABASE IF NOT EXISTS DocOffice;


CREATE TABLE IF NOT EXISTS Doctor(
	Doctor_ID varchar(50) PRIMARY KEY NOT NULL,
	Fname varchar(50) NOT NULL,
    Lname varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Appointments(
	App_ID varchar(50) PRIMARY KEY NOT NULL,
    Doc_Name varchar(50) NOT NULL,
    Pat_Name varchar(50) NOT NULL,
    Patient_ID varchar(50) NOT NULL,
    App_Date date NOT NULL,
    FOREIGN KEY (Pat_Name) REFERENCES Patient(Lname),
    FOREIGN KEY (Patient_ID) REFERENCES Patient(Patient_ID),
    FOREIGN KEY (Doc_Name) REFERENCES DOCTOR(Lname) 
);

CREATE TABLE IF NOT EXISTS Patients(
	Patient_ID varchar(50) PRIMARY KEY NOT NULL,
    Fname varchar(50) NOT NULL,
    Lname varchar(50) NOT NULL,
    Phone_num varchar(50) NOT NULL,
    Doctor_ID varchar(50) NOT NULL,
    App_ID varchar(50) NOT NULL,
    FOREIGN KEY (Doctor_ID) REFERENCES Doctor(Doctor_ID),
    FOREIGN KEY (App_ID) REFERENCES Appointments(App_ID)
    );
    
  CREATE TABLE IF NOT EXISTS Office(
  Office_ID varchar(50) PRIMARY KEY NOT NULL,
  Location varchar(50) NOT NULL 
  );
  
  CREATE TABLE IF NOT EXISTS Medicine(
  Med_ID varchar(50) PRIMARY KEY NOT NULL,
  Med_Name varchar(50) NOT NULL,
  Prescribed_By varchar(50) NOT NULL
  );
  
  CREATE TABLE IF NOT EXISTS Test(
  Test_ID varchar(50) PRIMARY KEY NOT NULL,
  Test_Name varchar(50) NOT NULL 
  );
  
  CREATE TABLE IF NOT EXISTS SPECIALTY (
    `Spec_ID` varchar(50) PRIMARY KEY,
    `Spec_Name` varchar(50)
);

-- Ashley made this table
CREATE TABLE IF NOT EXISTS AUDIT (
    Fname varchar(50) PRIMARY KEY,
    Action_ varchar(50),
    Spec_Name varchar(50),
    Date_Mod date
  ); 

-- Ashley made this table too  
CREATE TABLE IF NOT EXISTS DOC_SPECIALTY (
    Doctor_ID VARCHAR(50) NOT NULL,
    Spec_ID VARCHAR(50),
    FOREIGN KEY(Doctor_ID) references Doctor(Doctor_ID),
    FOREIGN KEY (Spec_ID) references SPECIALTY(Spec_ID)
);

INSERT INTO Doctor( Doctor_ID, Fname, Lname)
VALUES('D1234','Robert','Stevens'),
	  ('D0164', 'Bob', 'Jones'),
	  ('D2386','Steve','Irwin');
      
INSERT INTO Appointments(App_ID,Doc_name,Pat_name,Patient_ID,App_Date)
VALUES('A4876','Irwin','Lam','P9875','2022-12-24'),
	  ('A1378','Jones','Kuewa','P6768','2022-12-08'),
      ('A6786','Stevens','Cai', 'P7864','2023-01-03');      
INSERT INTO Patients( Patient_ID, Fname,Lname, Phone_num, Doctor_ID, App_ID)
VALUES('P9785', 'Stefan','Lam', '626-437-8590','D0164','A4876'),
	  ('P6768', 'Ashley','Kuewa','480-438-7014','D0164','A1378'),
      ('P7864', 'Jacky', 'Cai', '626-679-7970','D1234','A6786');

INSERT INTO Medicine( Med_ID,Med_name,Prescribed_by)
VALUES('M3048','Vicodin', 'D1234'),
	  ('M1245','Tylenol', 'D0164'),
      ('M3879', 'Advil', 'D2386');
      
INSERT INTO Office(Office_ID, Location)
VALUES('O5789','Orange'),
	  ('O8756','Santa Ana'),
      ('O6879','Yorba Linda');

INSERT INTO Test(Test_ID, Test_name)
VALUES/*('X-Ray','T8789'),
	  ('Blood Test','T9795'),*/
      ('Allergy Test', 'T156');
      
INSERT INTO specialty(Spec_ID,Spec_Name)
VALUES('D1234','Pediatrician');
      
CREATE VIEW Robert_Patients AS 
SELECT P.Fname,P.Lname, P.Phone_num from Patients P
WHERE P.Doctor_ID ='D1234';

CREATE VIEW Prescribe_Vicodin AS
SELECT D.Fname, D.Lname from Doctor D
INNER JOIN Medicine M ON D.Doctor_ID = M.Prescribed_by
WHERE M.Med_Name = "Vicodin";

CREATE VIEW DOC_SPEC AS 
SELECT D.Fname,D.Lname,S.Spec_Name FROM Doctor D 
INNER JOIN Specialty S ON D.Doctor_ID = S.Spec_ID;

ALTER VIEW DOC_SPEC AS 
SELECT D.Fname,D.Lname,S.Spec_Name FROM Doctor D
LEFT OUTER JOIN Specialty S ON D.Doctor_ID = S.Spec_ID;

CREATE TRIGGER insert_Spec
AFTER INSERT ON DOC_SPECECIALTY -- I added a new table line 60
FOR EACH ROW
INSERT INTO AUDIT(Fname, Action_,Spec_Name, Date_Mod) -- I added a new table line 53
VALUES((SELECT Fname FROM Doctor
        WHERE ( Doctor_ID = New.Doctor_ID)),"A doctor was added.", 
        (SELECT Spec_Name FROM SPECIALTY WHERE (Spec_ID = NEW.Spec_ID)), current_timestamp());

CREATE TRIGGER update_Spec
AFTER UPDATE ON DOC_SPECECIALTY
FOR EACH ROW
INSERT INTO AUDIT(Fname, Action_,Spec_Name, Date_Mod)
VALUES((SELECT Fname FROM Doctor
        WHERE (Doctor_ID = New.Doctor_ID)),"A doctor was updated.", 
        (SELECT Spec_Name FROM SPECIALTY WHERE ( Spec_ID = NEW.Spec_ID)), current_timestamp());
        
