-- Written by Brent J. Nordquist <bjn@horde.org>, June 5, 2002.

-- This script will convert an older (pre-1.0) Nag PostgreSQL table
-- to the Nag 1.0 format, by altering it in-place.

-- PostgreSQL "ALTER TABLE" is unfortunately rather limited; the following
-- doesn't replicate the Nag 1.0 table 100% but gets us "close enough"
-- for the application to work.

alter table nag_tasks
    rename column task_added to task_modified;
alter table nag_tasks
    add column task_category   int not null default 0;
alter table nag_tasks
    add column task_private    smallint not null default 1;
alter table nag_tasks
    alter column task_category   set default 0;
alter table nag_tasks
    alter column task_private    set default 1;
