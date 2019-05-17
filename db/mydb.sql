-- Table: public."User"

-- DROP TABLE public."User";

CREATE TABLE public."User"
(
    "UserID" integer NOT NULL,
    "FirstName" VARCHAR(30) NOT NULL,
    "MiddelName" VARCHAR(30),
    "LastName" VARCHAR(30) NOT NULL,
    "Zip" integer NOT NULL,
    CONSTRAINT "User_pkey" PRIMARY KEY ("UserID")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

-- Table: public."Group"

-- DROP TABLE public."Group";

CREATE TABLE public."Group"
(
    "GroupID" integer NOT NULL,
    "UserID" integer NOT NULL,
    "Zip" integer NOT NULL,
    "Classification" VARCHAR(30),
    CONSTRAINT "Group_pkey" PRIMARY KEY ("GroupID"),
    CONSTRAINT "Group_fk_01" FOREIGN KEY ("UserID")
        REFERENCES public."User" ("UserID") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;


-- Table: public."Event"

-- DROP TABLE public."Event";

CREATE TABLE public."Event"
(
    "EventID" integer NOT NULL,
    "GroupID" integer,
    "UserID" integer,
    "Zip" integer NOT NULL,
    "Classification" VARCHAR(30),
    CONSTRAINT "Event_pkey" PRIMARY KEY ("EventID"),
    CONSTRAINT "Event_fk_01" FOREIGN KEY ("GroupID")
        REFERENCES public."Group" ("GroupID") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT "Event_fk_02" FOREIGN KEY ("UserID")
        REFERENCES public."User" ("UserID") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;


