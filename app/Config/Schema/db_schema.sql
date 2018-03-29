/*
This is PostgreSQL database initialisation file, the original SW was writen for
MySQL, but schema was stored nowhere. This was create for testing purposes.
*/

CREATE TABLE languages (
    id serial PRIMARY KEY,
    language text NOT NULL UNIQUE
);

CREATE TABLE users (
    id serial PRIMARY KEY,
    name text NOT NULL UNIQUE,
    created timestamp NOT NULL,
    modified timestamp NOT NULL
);

CREATE TABLE books (
    id serial PRIMARY KEY,
    user_id integer REFERENCES users (id),
    language_id integer REFERENCES languages (id),
    name text NOT NULL UNIQUE,
    description text,
    created timestamp NOT NULL,
    modified timestamp NOT NULL
);

CREATE TABLE items (
    id serial PRIMARY KEY,
    user_id integer REFERENCES users (id),
    name text NOT NULL,
    barcode bigint,
    description text,
    created timestamp NOT NULL,
    modified timestamp NOT NULL
);

GRANT ALL ON DATABASE brmsklad TO brmsklad;
GRANT SELECT, INSERT, UPDATE ON TABLE languages TO brmsklad;
GRANT USAGE ON SEQUENCE languages_id_seq TO brmsklad;
GRANT SELECT, INSERT, UPDATE ON TABLE users TO brmsklad;
GRANT USAGE ON SEQUENCE users_id_seq TO brmsklad;
GRANT SELECT, INSERT, UPDATE ON TABLE books TO brmsklad;
GRANT USAGE ON SEQUENCE books_id_seq TO brmsklad;
GRANT SELECT, INSERT, UPDATE ON TABLE items TO brmsklad;
GRANT USAGE ON SEQUENCE items_id_seq TO brmsklad;
