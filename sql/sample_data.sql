USE Octocat;

/* SAMPLE DATA: Giving a user to log in with */
SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE User; SET FOREIGN_KEY_CHECKS = 1;
insert into User
values (NULL, 'brentrockwell', 'testing123', 'brent', '', 'rockwell', 'agntnbr004@gmail.com', true);

select *
from User;

/* SAMPLE DATA: Giving a user 2 addresses */
SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE Address; SET FOREIGN_KEY_CHECKS = 1;
insert into Address
values (NULL,
        (select user_id from User where username= 'brentrockwell'),
        true,
        '1234 fake st',
        NULL,
        'faketown',
        (select state_id from State where abbreviation= 'CA'),
        '00000',
        false),
       (NULL,
        (select user_id from User where username= 'brentrockwell'),
        false,
        '2345 imaginary rd',
        NULL,
        'fancyplace',
        (select state_id from State where abbreviation= 'HI'),
        '10101',
        false);

select *
from Address;

/* SAMPLE DATA: Showing the user had an old and new credit card */
SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE Payment; SET FOREIGN_KEY_CHECKS = 1;
insert into Payment
values (NULL,
        (select user_id from User where username= 'brentrockwell'),
        false,
        (select cardtype_id from CardType where cardtype='Discover'),
        'Brent C Rockwell',
        '6000-0000-0000-0000',
        CAST('2022-10-01' as date),
        true),
       (NULL,
        (select user_id from User where username= 'brentrockwell'),
        true,
        (select cardtype_id from CardType where cardtype='visa'),
        'Brent C Rockwell',
        '4000-0000-0000-0000',
        CAST('2024-06-01' as date),
        false);

select *
from Payment;

/* SAMPLE DATA: Creating products to show on website */
SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE Product; SET FOREIGN_KEY_CHECKS = 1;
insert into Product
values -- 3D MODELS --
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Rocksteady',
        '3D model of Rocksteady from Teenage Mutant Ninja Turtles',
        14.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'SpongeBob',
        '3D model of SpongeBob SquarePants',
        1.99),
        (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Link',
        '3D model of Link from Zelda',
        4.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Ray',
        '3D model of Ray from no one knows where',
        2.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Zombie',
        '3D model of a basic zombie',
        3.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Sword',
        '3D model of a simple sword',
        0.89),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'AK-47',
        '3D model of SpongeBob SquarePants',
        1.49),
        (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Boulder',
        '3D model of an big rock',
        0.49),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'House',
        '3D model of a nice house',
        3.49),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='3D Models'),
        'Crystal',
        '3D model of a pretty crystal',
        0.99);
insert into Product
values -- AUDIO --
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Sword Swing',
        'Sound clip of a sword swinging through the air',
        0.25),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Fall',
        'Sound clip of an object falling',
        0.29),
        (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Gun Shot',
        'Sound clip of a gunshot',
        0.22),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Leaves Crunch',
        'Sound clip of leaves being crunched',
        0.37),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Death Cry',
        'Sound clip of something dying',
        3.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Bones',
        'Sound clip of bones clacking',
        0.89),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Door close',
        'Sound clip of a door clacking shut',
        1.49),
        (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Wind',
        'Sound clip of a wind blowing',
        0.49),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Creaking',
        'Sound clip of boards creaking',
        3.49),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Audio'),
        'Howl',
        'Sound clip of something howling in the distance',
        0.99);
insert into Product
values -- SCRIPTS --
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'PlayerController',
        'A script that helps manage player movement and health',
        14.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'GameController',
        'A script that helps manage game win conditions, time, weather, etc',
        14.99),
        (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'SpawnController',
        'A script that controls when, where, and what mobs spawn',
        4.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'InventorySystem',
        'A script to manage a players inventory',
        2.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'QuestSystem',
        'A script to help manage the creation and tracking of quests',
        3.99),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'PlayerEquipment',
        'A script to help keep track of what items the player has equipped',
        0.89),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'BossEncounter',
        'A script to keep track of bosses, fight stages, etc',
        1.49),
        (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'SandboxSystem',
        'A script to help with sandbox games where you can build items',
        0.49),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'SkillTreeSystem',
        'A script for creating skill trees for RPGs',
        3.49),
       (NULL,
        (select PRODUCTTYPE_ID from ProductType where producttype='Scripts'),
        'VoxelSystem',
        'A script for allowing a destructible world',
        0.99);

select *
from Product;

/* SAMPLE DATA: Showing the user has placed 2 orders */
SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE OrderHistory; SET FOREIGN_KEY_CHECKS = 1;
insert into OrderHistory
values (NULL,
        (select user_id from User where username= 'brentrockwell'),
        (select payment_id from Payment where user_id = (select user_id from User where username= 'brentrockwell') and removed=true),
        CAST('2018-12-24' as date),
        121.33),
       (NULL,
        (select user_id from User where username= 'brentrockwell'),
        (select payment_id from Payment where user_id = (select user_id from User where username= 'brentrockwell') and removed=false),
        CAST('2020-02-14' as date),
        215.46);

select *
from OrderHistory;

/* SAMPLE DATA: Showing the details of the 2 orders the customer placed */
SET FOREIGN_KEY_CHECKS = 0; TRUNCATE TABLE OrderDetails; SET FOREIGN_KEY_CHECKS = 1;
insert into OrderDetails
values (NULL, 1, 4, 1, 2.99),
       (NULL, 1, 11, 1, 0.25),
       (NULL, 1, 6, 1, 0.89),
       (NULL, 1, 21, 1, 14.99),
       (NULL, 1, 22, 1, 14.99),
       (NULL, 1, 18, 1, 0.49),
       (NULL, 1, 25, 1, 3.99),
       (NULL, 2, 5, 1, 3.99),
       (NULL, 2, 15, 1, 3.99),
       (NULL, 2, 16, 1, 0.89),
       (NULL, 2, 20, 1, 0.99),
       (NULL, 2, 23, 1, 4.99),
       (NULL, 2, 27, 1, 1.49);

select *
from OrderDetails;
