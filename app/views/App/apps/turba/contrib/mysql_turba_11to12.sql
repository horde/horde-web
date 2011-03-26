-- Written by Brent J. Nordquist <bjn@horde.org>, June 25, 2002.

-- This script will convert a Turba 1.1 MySQL table to the
-- (upcoming) Turba 1.2 format, by altering it in-place.

alter table turba_objects
	add column object_pgppublickey text after object_notes;
