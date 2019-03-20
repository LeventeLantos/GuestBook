## Guestbook homework

### Postgres setup

-- Table: public.test01

-- DROP TABLE public.test01;

CREATE TABLE public.test01
(
    title text COLLATE pg_catalog."default",
    body text COLLATE pg_catalog."default",
    stars integer,
    review_id integer NOT NULL DEFAULT nextval('"test01_ID_seq"'::regclass)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.test01
    OWNER to drupal;
