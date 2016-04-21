/* ---------------------------------------------------------------------- */
/* Script generated with: DeZign for Databases v6.3.2                     */
/* Target DBMS:           PostgreSQL 9                                    */
/* Project file:          ERD.dez                                         */
/* Project name:                                                          */
/* Author:                                                                */
/* Script type:           Database creation script                        */
/* Created on:            2016-03-23 22:06                                */
/* ---------------------------------------------------------------------- */


/* ---------------------------------------------------------------------- */
/* Tables                                                                 */
/* ---------------------------------------------------------------------- */

/* ---------------------------------------------------------------------- */
/* Add table "Person_Involve"                                             */
/* ---------------------------------------------------------------------- */

CREATE TABLE Person_Involve (
    person_involve_id INTEGER  NOT NULL AUTO_INCREMENT,
    name CHARACTER VARYING(40),
    college_center CHARACTER VARYING(40),
    dept CHARACTER VARYING(40),
    contact CHARACTER VARYING(40),
    email CHARACTER VARYING(40),
    pos CHARACTER(40),
    CONSTRAINT PK_Person_Involve PRIMARY KEY (person_involve_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Role"                                                       */
/* ---------------------------------------------------------------------- */

CREATE TABLE Role (
    role_id INTEGER  NOT NULL AUTO_INCREMENT,
    role_name CHARACTER(40),
    CONSTRAINT PK_Role PRIMARY KEY (role_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "User_Type"                                                  */
/* ---------------------------------------------------------------------- */

CREATE TABLE User_Type (
    user_type_id INTEGER  NOT NULL AUTO_INCREMENT,
    name CHARACTER(40),
    CONSTRAINT PK_User_Type PRIMARY KEY (user_type_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Users"                                                      */
/* ---------------------------------------------------------------------- */

CREATE TABLE Users (
    user_id INTEGER  NOT NULL AUTO_INCREMENT,
    f_name CHARACTER(40),
    l_name CHARACTER(40),
    m_name CHARACTER(40),
    username CHARACTER(40),
    password CHARACTER(40),
    user_type_id INTEGER  NOT NULL,
    CONSTRAINT PK_Users PRIMARY KEY (user_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Trainings"                                                  */
/* ---------------------------------------------------------------------- */

CREATE TABLE Trainings (
    training_id INTEGER  NOT NULL AUTO_INCREMENT,
    user_id INTEGER  NOT NULL,
    title CHARACTER VARYING(40),
    description CHARACTER VARYING(40),
    venue CHARACTER VARYING(40),
    status CHARACTER VARYING(40),
    CONSTRAINT PK_Trainings PRIMARY KEY (training_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "SO"                                                         */
/* ---------------------------------------------------------------------- */

CREATE TABLE SO (
    so_id INTEGER  NOT NULL AUTO_INCREMENT,
    ref_no CHARACTER VARYING(40),
    date_created DATE,
    recipient CHARACTER VARYING(40),
    office CHARACTER VARYING(40),
    training_id INTEGER  NOT NULL,
    CONSTRAINT PK_SO PRIMARY KEY (so_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Training_Details"                                           */
/* ---------------------------------------------------------------------- */

CREATE TABLE Training_Details (
    training_id INTEGER  NOT NULL,
    person_involve_id INTEGER  NOT NULL,
    status CHARACTER(40),
    CONSTRAINT PK_Training_Details PRIMARY KEY (training_id, person_involve_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Training_Team"                                              */
/* ---------------------------------------------------------------------- */

CREATE TABLE Training_Team (
    training_id INTEGER  NOT NULL ,
    person_involve_id INTEGER  NOT NULL,
    role_id INTEGER  NOT NULL,
    CONSTRAINT PK_Training_Team PRIMARY KEY (training_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Training_Schedule"                                          */
/* ---------------------------------------------------------------------- */

CREATE TABLE Training_Schedule (
    training_sched_id INTEGER  NOT NULL AUTO_INCREMENT,
    training_id INTEGER  NOT NULL,
    date CHARACTER(40),
    CONSTRAINT PK_Training_Schedule PRIMARY KEY (training_sched_id)
);

/* ---------------------------------------------------------------------- */
/* Add table "Attendance"                                                 */
/* ---------------------------------------------------------------------- */

CREATE TABLE Attendance (
    training_sched_id INTEGER  NOT NULL,
    training_id INTEGER  NOT NULL,
    person_involve_id INTEGER  NOT NULL,
    presence CHARACTER VARYING(40),
    CONSTRAINT PK_Attendance PRIMARY KEY (training_sched_id, training_id, person_involve_id)
);

/* ---------------------------------------------------------------------- */
/* Foreign key constraints                                                */
/* ---------------------------------------------------------------------- */

ALTER TABLE Trainings ADD CONSTRAINT Users_Trainings 
    FOREIGN KEY (user_id) REFERENCES Users (user_id);

ALTER TABLE SO ADD CONSTRAINT Trainings_SO 
    FOREIGN KEY (training_id) REFERENCES Trainings (training_id);

ALTER TABLE Training_Details ADD CONSTRAINT Trainings_Training_Details 
    FOREIGN KEY (training_id) REFERENCES Trainings (training_id);

ALTER TABLE Training_Details ADD CONSTRAINT Person_Involve_Training_Details 
    FOREIGN KEY (person_involve_id) REFERENCES Person_Involve (person_involve_id);
	 
ALTER TABLE Training_Team ADD CONSTRAINT Trainings_Training_Team 
    FOREIGN KEY (training_id) REFERENCES Trainings (training_id);

ALTER TABLE Training_Team ADD CONSTRAINT Person_Involve_Training_Team 
    FOREIGN KEY (person_involve_id) REFERENCES Person_Involve (person_involve_id);

ALTER TABLE Training_Team ADD CONSTRAINT Role_Training_Team 
    FOREIGN KEY (role_id) REFERENCES Role (role_id);

ALTER TABLE Training_Schedule ADD CONSTRAINT Trainings_Training_Schedule 
    FOREIGN KEY (training_id) REFERENCES Trainings (training_id);

ALTER TABLE Attendance ADD CONSTRAINT Training_Schedule_Attendance 
    FOREIGN KEY (training_sched_id) REFERENCES Training_Schedule (training_sched_id);

ALTER TABLE Attendance ADD CONSTRAINT Training_Details_Attendance 
    FOREIGN KEY (training_id, person_involve_id) REFERENCES Training_Details (training_id,person_involve_id);

ALTER TABLE Users ADD CONSTRAINT User_Type_Users 
    FOREIGN KEY (user_type_id) REFERENCES User_Type (user_type_id);
