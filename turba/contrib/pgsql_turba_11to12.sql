-- Written by Brent J. Nordquist <bjn@horde.org>, June 25, 2002.

-- This script will convert a Turba 1.1 PostgreSQL table to the
-- (upcoming) Turba 1.2 format, by altering it in-place.

-- PostgreSQL "ALTER TABLE" is unfortunately rather limited; the following
-- doesn't replicate the Turba 1.2 table 100% but gets us "close enough"
-- for the application to work.

alter table turba_objects
	add column object_pgppublickey text;
