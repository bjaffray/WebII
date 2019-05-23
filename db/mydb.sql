-- Table: public."User"

 DROP TABLE public."User";

CREATE TABLE public."User"
("UserID"       INTEGER         NOT NULL
,"FirstName"    VARCHAR(30)     NOT NULL
,"MidName"      VARCHAR(30)
,"LastName"     VARCHAR(30)     NOT NULL
,"Zip"          INTEGER         NOT NULL
,CONSTRAINT "user_pk_01" PRIMARY KEY ("UserID"))
WITH (OIDS = FALSE)
TABLESPACE pg_default;

-- Table: public."Group"

 DROP TABLE public."Group";

CREATE TABLE public."Group"
("GroupID"          INTEGER     NOT NULL
,"UserID"           INTEGER     NOT NULL
,"Zip"              INTEGER     NOT NULL
,"Classification"   VARCHAR(30) NOT NULL
,CONSTRAINT "group_pk_01" PRIMARY KEY ("GroupID")
,CONSTRAINT "group_fk_01" FOREIGN KEY ("UserID") REFERENCES public."User" ("UserID") MATCH SIMPLE 
    ON UPDATE NO ACTION ON DELETE NO ACTION)
WITH (OIDS = FALSE)
TABLESPACE pg_default;


-- Table: public."Event"

 DROP TABLE public."Event";

CREATE TABLE public."Event"
("EventID"          INTEGER     NOT NULL
,"GroupID"          INTEGER
,"UserID"           INTEGER     NOT NULL
,"Zip"              INTEGER     NOT NULL
,"Date"             DATE        NOT NULL
,"Classification"   VARCHAR(30) NOT NULL
,CONSTRAINT "event_pk_01" PRIMARY KEY ("EventID")
,CONSTRAINT "event_fk_01" FOREIGN KEY ("GroupID") REFERENCES public."Group" ("GroupID") MATCH SIMPLE
    ON UPDATE NO ACTION ON DELETE NO ACTION
,CONSTRAINT "event_fk_02" FOREIGN KEY ("UserID") REFERENCES public."User" ("UserID") MATCH SIMPLE
    ON UPDATE NO ACTION ON DELETE NO ACTION)
WITH (OIDS = FALSE)
TABLESPACE pg_default;


