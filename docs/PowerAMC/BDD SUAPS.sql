/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18/12/2017 15:42:11                          */
/*==============================================================*/


drop table if exists DATE;

drop table if exists RESERVER;

drop table if exists USERS;

/*==============================================================*/
/* Table: DATE                                                  */
/*==============================================================*/
create table DATE
(
   DATERESERV           varchar(255) not null,
   WE                   bool,
   primary key (DATERESERV)
);

/*==============================================================*/
/* Table: RESERVER                                              */
/*==============================================================*/
create table RESERVER
(
   IDUSER               int not null,
   DATERESERV           varchar(255) not null,
   primary key (IDUSER, DATERESERV)
);

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS
(
   IDUSER               int not null,
   NOM                  varchar(255),
   PRENOM               varchar(255),
   USERNAME             varchar(255),
   TYPE                 varchar(255),
   ADMIN                bool,
   MAIL                 varchar(255),
   TELEPHONE            varchar(255),
   TICKET_SEMAINE       int,
   TICKET_WE            int,
   PASSWORD             varchar(255),
   NBPARCOURS           int,
   NBRESERVATION        int,
   NBINVITATION         int,
   primary key (IDUSER)
);

alter table RESERVER add constraint FK_RESERVER foreign key (DATERESERV)
      references DATE (DATERESERV) on delete restrict on update restrict;

alter table RESERVER add constraint FK_RESERVER2 foreign key (IDUSER)
      references USERS (IDUSER) on delete restrict on update restrict;

