/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     08/01/2018 16:06:21                          */
/*==============================================================*/


drop table if exists RESERVATION;

drop table if exists USERS;

/*==============================================================*/
/* Table: RESERVATION                                           */
/*==============================================================*/
create table RESERVATION
(
   IDRESERV             int not null,
   IDUSER               int not null,
   USE_IDUSER           int,
   DATEPREVU            varchar(255),
   DATERESERV           varchar(255),
   primary key (IDRESERV)
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

alter table RESERVATION add constraint FK_INVITER foreign key (USE_IDUSER)
      references USERS (IDUSER) on delete restrict on update restrict;

alter table RESERVATION add constraint FK_RESERVER foreign key (IDUSER)
      references USERS (IDUSER) on delete restrict on update restrict;

