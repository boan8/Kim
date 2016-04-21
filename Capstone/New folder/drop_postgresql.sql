/* ---------------------------------------------------------------------- */
/* Script generated with: DeZign for Databases v6.3.2                     */
/* Target DBMS:           PostgreSQL 9                                    */
/* Project file:          ERD.dez                                         */
/* Project name:                                                          */
/* Author:                                                                */
/* Script type:           Database drop script                            */
/* Created on:            2016-04-16 20:26                                */
/* ---------------------------------------------------------------------- */


/* ---------------------------------------------------------------------- */
/* Drop foreign key constraints                                           */
/* ---------------------------------------------------------------------- */

ALTER TABLE Trainings DROP CONSTRAINT Users_Trainings;

ALTER TABLE SO DROP CONSTRAINT Trainings_SO;

ALTER TABLE Training_Details DROP CONSTRAINT Trainings_Training_Details;

ALTER TABLE Training_Details DROP CONSTRAINT Person_Involve_Training_Details;

ALTER TABLE Training_Team DROP CONSTRAINT Trainings_Training_Team;

ALTER TABLE Training_Team DROP CONSTRAINT Person_Involve_Training_Team;

ALTER TABLE Training_Team DROP CONSTRAINT Role_Training_Team;

ALTER TABLE Training_Schedule DROP CONSTRAINT Trainings_Training_Schedule;

ALTER TABLE Attendance DROP CONSTRAINT Training_Schedule_Attendance;

ALTER TABLE Attendance DROP CONSTRAINT Training_Details_Attendance;

ALTER TABLE Users DROP CONSTRAINT User_Type_Users;

/* ---------------------------------------------------------------------- */
/* Drop table "Attendance"                                                */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Attendance DROP CONSTRAINT PK_Attendance;

/* Drop table */

DROP TABLE Attendance;

/* ---------------------------------------------------------------------- */
/* Drop table "Training_Schedule"                                         */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Training_Schedule DROP CONSTRAINT PK_Training_Schedule;

/* Drop table */

DROP TABLE Training_Schedule;

/* ---------------------------------------------------------------------- */
/* Drop table "Training_Team"                                             */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Training_Team DROP CONSTRAINT PK_Training_Team;

/* Drop table */

DROP TABLE Training_Team;

/* ---------------------------------------------------------------------- */
/* Drop table "Training_Details"                                          */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Training_Details DROP CONSTRAINT PK_Training_Details;

/* Drop table */

DROP TABLE Training_Details;

/* ---------------------------------------------------------------------- */
/* Drop table "SO"                                                        */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE SO DROP CONSTRAINT PK_SO;

/* Drop table */

DROP TABLE SO;

/* ---------------------------------------------------------------------- */
/* Drop table "Trainings"                                                 */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Trainings DROP CONSTRAINT PK_Trainings;

/* Drop table */

DROP TABLE Trainings;

/* ---------------------------------------------------------------------- */
/* Drop table "Users"                                                     */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Users DROP CONSTRAINT PK_Users;

/* Drop table */

DROP TABLE Users;

/* ---------------------------------------------------------------------- */
/* Drop table "User_Type"                                                 */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE User_Type DROP CONSTRAINT PK_User_Type;

/* Drop table */

DROP TABLE User_Type;

/* ---------------------------------------------------------------------- */
/* Drop table "Role"                                                      */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Role DROP CONSTRAINT PK_Role;

/* Drop table */

DROP TABLE Role;

/* ---------------------------------------------------------------------- */
/* Drop table "Person_Involve"                                            */
/* ---------------------------------------------------------------------- */

/* Drop constraints */

ALTER TABLE Person_Involve DROP CONSTRAINT PK_Person_Involve;

/* Drop table */

DROP TABLE Person_Involve;
