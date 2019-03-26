## Guestbook homework

### Pg setup

-- Table: public.guestbook1

-- DROP TABLE public.guestbook1;

CREATE TABLE public.guestbook1
(
    title text COLLATE pg_catalog."default",
    body text COLLATE pg_catalog."default",
    stars integer,
    id integer NOT NULL DEFAULT nextval('"guestbook1_ID_seq"'::regclass),
    allowed boolean NOT NULL DEFAULT true,
    CONSTRAINT guestbook1_pkey PRIMARY KEY (id)
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public.guestbook1
    OWNER to drupal;
