use Octocat;

drop table if exists test;
create table if not exists test
(
    test_id int not null primary key auto_increment,
    value_1 nvarchar(100) null,
    value_2 int null,
    value_3 decimal(13, 4) null
);

insert into test
values (null, "brent wrote this", 4, 42.69);

select * from test;

-- drop table if exists test;
