-- Table: public."User"

DROP TABLE public."User";

CREATE SEQUENCE user_id_seq;

CREATE TABLE public."User"
("UserID"       INTEGER DEFAULT NEXTVAL('user_id_seq')
,"UserName"     VARCHAR(30)     NOT NULL
,"Password"     VARCHAR(30)     NOT NULL
,"FirstName"    VARCHAR(30)     NOT NULL
,"MidName"      VARCHAR(30)
,"LastName"     VARCHAR(30)     NOT NULL
,"Zip"          INTEGER         NOT NULL
,CONSTRAINT "user_pk_01" PRIMARY KEY ("UserID"))
WITH (OIDS = FALSE)
TABLESPACE pg_default;

-- Table: public."Group"

DROP TABLE public."Group";

CREATE SEQUENCE group_id_seq;

CREATE TABLE public."Group"
("GroupID"          INTEGER DEFAULT NEXTVAL('group_id_seq')
,"UserID"           INTEGER     NOT NULL
,"Name"             VARCHAR(30) NOT NULL
,"Zip"              INTEGER     NOT NULL
,"Classification"   VARCHAR(30) NOT NULL
,CONSTRAINT "group_pk_01" PRIMARY KEY ("GroupID")
,CONSTRAINT "group_fk_01" FOREIGN KEY ("UserID") REFERENCES public."User" ("UserID") MATCH SIMPLE 
    ON UPDATE NO ACTION ON DELETE NO ACTION)
WITH (OIDS = FALSE)
TABLESPACE pg_default;


-- Table: public."Event"

DROP TABLE public."Event";

CREATE SEQUENCE event_id_seq;

CREATE TABLE public."Event"
("EventID"          INTEGER DEFAULT NEXTVAL('event_id_seq')
,"GroupID"          INTEGER
,"UserID"           INTEGER     NOT NULL
,"Name"             VARCHAR(30) NOT NULL
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


/*
INSERT INTO public."User"
("UserName"
,"Password"
,"FirstName"
,"MidName"
,"LastName"
,"Zip")
VALUES 
('UserName'
,'Password'
,'Test'
,'Mid'
,'Name'
,1111);

INSERT INTO public."Group"
("UserID"
,"Name"
,"Zip"
,"Classification")
VALUES 
(1
,'Group1'
,1111
,'Test Class');

INSERT INTO public."Event"
("GroupID"
,"UserID"
,"Name"
,"Zip"
,"Date"
,"Classification")
VALUES 
(1
,1
,'Event1'
,1111
,current_date
,'Test Class');

DELETE FROM public."User";
DELETE FROM public."Group";
DELETE FROM public."Event";

SELECT * FROM public."User";
SELECT * FROM public."Group";
SELECT * FROM public."Event";

ALTER SEQUENCE user_id_seq RESTART;
ALTER SEQUENCE group_id_seq RESTART;
ALTER SEQUENCE event_id_seq RESTART;
*/