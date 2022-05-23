 /* (1) users that are clients */

/*
select  User_Fname , User_Minit, User_Lname 
from user
where User_type = 'client'
;
*/

/* (2) users that are photographers */

/*
select  User_Fname , User_Minit, User_Lname 
from user
inner join photographer on user.User_email = photographer.User_User_email
where User_User_email in(
select  User_User_email
from photographer
 )
;
*/

/* (3) client late photograher Report_complaint */

/*
select  User_Fname , User_Minit, User_Lname 
from report
inner join user on user.User_email = report.Client_User_User_email
where Report_complaint in(
select  Report_complaint
from report
where Report_complaint = 'late' )
;
*/

/* (4) Emails of  photograhers  working in best rate catagories */

 /*
select   Photographer_User_User_email
from catagories
inner join photographer_has_catagories on photographer_has_catagories.Catagories_Catagories_type = catagories.Catagories_type 
where Catagories_rate in(
select  max(Catagories_rate)
from catagories )
;
 */
 
/* (5) name of  professionals photograhers  */

/*
select  User_Fname , User_Minit, User_Lname 
from user
inner join photographer on photographer.User_User_email = user.User_email
where Photographer_level in(
select  Photographer_level
from photographer 
where Photographer_level= 'professional')
;
*/

/* (6) name of  amateur photograhers  */

/*
select  User_Fname , User_Minit, User_Lname 
from user
inner join photographer on photographer.User_User_email = user.User_email
where Photographer_level in(
select  Photographer_level
from photographer 
where Photographer_level= 'amateur')
;
*/
 
/* (7) best rate user */

 /*
select  User_Fname , User_Minit, User_Lname ,user.User_type
from user_rate
inner join user on user_rate.User_User_email = user.User_email
where user_rate in(
select  max(user_rate) 
from user_rate )
;
*/

/* (8) worst rate user  */

/*
select  User_Fname , User_Minit, User_Lname ,user.User_type
from user_rate
inner join user on user_rate.User_User_email = user.User_email
where user_rate in(select  min(user_rate) from user_rate)
;
*/

/* (9) unavailable photographers */

/*
select  User_Fname,User_Minit,User_Lname ,appointment.appo_date , available_time
from available_time
  inner join user  on  User_email = available_time.Photographer_User_User_email 
  inner join appointment  on  appointment.Photographer_User_User_email = available_time.Photographer_User_User_email 
where  appointment.appo_date = available_time 
;
*/

/* (9) available photographer*/

/*
select  User_Fname,User_Minit,User_Lname, appointment.appo_date , available_time
from available_time
  inner join user  on  User_email = available_time.Photographer_User_User_email 
  inner join appointment  on  appointment.Photographer_User_User_email = available_time.Photographer_User_User_email 
where  appointment.appo_date != available_time  
group by User_Fname,User_Minit,User_Lname 
;
*/

/* (10) nearest studio to client in dokki */

/*
select  photographer.Photographer_studio, photographer.User_User_email, user.User_gov,User_Fname
from photographer
inner join user on photographer.User_User_email = user.User_email
where User_city in(
select  User_city
from user
where  Photographer_studio = 'dokki')
;
*/

/* (11) nearest photographer to a client in dokki*/

/*
select  User_Fname, User_Minit,User_Lname
from user
inner join photographer on photographer.User_User_email = user.User_email
where User_city in(
select  User_city
from user
where User_city = 'dokki' )
;
*/

/* (11) clients paying cash */

/*
select  User_Fname,User_Minit,User_Lname
from user
inner join appointment on appointment.Client_User_User_email = user.User_email
where appo_payment in(
select  appo_payment
from appointment
where appo_payment='cash')
;
*/

/* (12) clients paying visa */

/*
select  User_Fname,User_Minit,User_Lname
from user
inner join appointment on appointment.Client_User_User_email = user.User_email
where appo_payment in(
select  appo_payment
from appointment
where appo_payment='visa')
;
*/

/* (12) photographers  product catogroy */

/*
select  User_Fname,User_Minit,User_Lname
from user
inner join Photographer_has_Catagories on Photographer_User_User_email = user.User_email
where Catagories_Catagories_type in(
select  Catagories_Catagories_type
from Photographer_has_Catagories
where Catagories_Catagories_type='products')
;
*/
 


/* (1) users that are clients */

/*
select  User_Fname , User_Minit, User_Lname 
from user
where User_type = 'client'
;
*/

/* (2) users that are photographers */

/*
select  User_Fname , User_Minit, User_Lname 
from user
inner join photographer on user.User_email = photographer.User_User_email
where User_User_email in(
select  User_User_email
from photographer
 )
;
*/

/* (3) client late photograher Report_complaint */

/*
select  User_Fname , User_Minit, User_Lname 
from report
inner join user on user.User_email = report.Client_User_User_email
where Report_complaint in(
select  Report_complaint
from report
where Report_complaint = 'late' )
;
*/

/* (4) Emails of  photograhers  working in best rate catagories */

 /*
select   Photographer_User_User_email
from catagories
inner join photographer_has_catagories on photographer_has_catagories.Catagories_Catagories_type = catagories.Catagories_type 
where Catagories_rate in(
select  max(Catagories_rate)
from catagories )
;
 */
 
/* (5) name of  professionals photograhers  */

/*
select  User_Fname , User_Minit, User_Lname 
from user
inner join photographer on photographer.User_User_email = user.User_email
where Photographer_level in(
select  Photographer_level
from photographer 
where Photographer_level= 'professional')
;
*/

/* (6) name of  amateur photograhers  */

/*
select  User_Fname , User_Minit, User_Lname 
from user
inner join photographer on photographer.User_User_email = user.User_email
where Photographer_level in(
select  Photographer_level
from photographer 
where Photographer_level= 'amateur')
;
*/
 
/* (7) best rate user */

 /*
select  User_Fname , User_Minit, User_Lname ,user.User_type
from user_rate
inner join user on user_rate.User_User_email = user.User_email
where user_rate in(
select  max(user_rate) 
from user_rate )
;
*/

/* (8) worst rate user  */

/*
select  User_Fname , User_Minit, User_Lname ,user.User_type
from user_rate
inner join user on user_rate.User_User_email = user.User_email
where user_rate in(select  min(user_rate) from user_rate)
;
*/

/* (9) unavailable photographers */

/*
select  User_Fname,User_Minit,User_Lname ,appointment.appo_date , available_time
from available_time
  inner join user  on  User_email = available_time.Photographer_User_User_email 
  inner join appointment  on  appointment.Photographer_User_User_email = available_time.Photographer_User_User_email 
where  appointment.appo_date = available_time 
;
*/

/* (9) available photographer*/

/*
select  User_Fname,User_Minit,User_Lname, appointment.appo_date , available_time
from available_time
  inner join user  on  User_email = available_time.Photographer_User_User_email 
  inner join appointment  on  appointment.Photographer_User_User_email = available_time.Photographer_User_User_email 
where  appointment.appo_date != available_time  
group by User_Fname,User_Minit,User_Lname 
;
*/

/* (10) nearest studio to client in dokki */

/*
select  photographer.Photographer_studio, photographer.User_User_email, user.User_gov,User_Fname
from photographer
inner join user on photographer.User_User_email = user.User_email
where User_city in(
select  User_city
from user
where  Photographer_studio = 'dokki')
;
*/

/* (11) nearest photographer to a client in dokki*/

/*
select  User_Fname, User_Minit,User_Lname
from user
inner join photographer on photographer.User_User_email = user.User_email
where User_city in(
select  User_city
from user
where User_city = 'dokki' )
;
*/

/* (11) clients paying cash */

/*
select  User_Fname,User_Minit,User_Lname
from user
inner join appointment on appointment.Client_User_User_email = user.User_email
where appo_payment in(
select  appo_payment
from appointment
where appo_payment='cash')
;
*/

/* (12) clients paying visa */

/*
select  User_Fname,User_Minit,User_Lname
from user
inner join appointment on appointment.Client_User_User_email = user.User_email
where appo_payment in(
select  appo_payment
from appointment
where appo_payment='visa')
;
*/

/* (12) photographers  product catogroy */

/*
select  User_Fname,User_Minit,User_Lname
from user
inner join Photographer_has_Catagories on Photographer_User_User_email = user.User_email
where Catagories_Catagories_type in(
select  Catagories_Catagories_type
from Photographer_has_Catagories
where Catagories_Catagories_type='products')
;
*/


 

/*
select Photographer_User_User_email
from available_time
where '2022-6-3 16:00:00' between available_start_time and available_end_time
;
*/
/*

select *
from available_time
 
;
*/

delete
from available_time
where   '2022-6-3 16:00:00' between available_start_time and available_end_time;

delete 
from available_time
where  Photographer_User_User_email= 'akramsaber45@gmail.com'  ;

 select *, addtime(available_start_time, '1:0:0.000') as available_start_time
 from available_time
 where Photographer_User_User_email= 'ahmedsami3@gmail.com';

insert into  available_time
values( '11', '2022-6-3 16:00:00'   ,  '2022-6-3 18:00:00' , 'ahmedsami3@gmail.com')
 
 ;
 
 /* he will make update and insert 
 
 
 
 */
 
 update available_time
 set available_start_time = DATE_ADD( available_start_time , interval 1 hour)
 where Photographer_User_User_email= 'ahmedsami3@gmail.com'; 
 
 
insert into  available_time
values( '11', '2022-6-3 16:00:00'   ,  '2022-6-3 18:00:00' , 'ahmedsami3@gmail.com')
 
 ;
 
 
 
 
 
 DROP PROCEDURE IF EXISTS create_date_for_year;
DELIMITER //
CREATE PROCEDURE create_date_for_year (IN year INT)
BEGIN
    DECLARE day INT DEFAULT 1;
    SET day=1;
    WHILE day < 366 DO  
        IF WEEKDAY(MAKEDATE(year, day)) NOT IN (3,4) THEN -- skip thursday and friday
            INSERT INTO available_time (available_start_time, available_end_time , Photographer_User_User_email , work_time_start, work_time_end) VALUES ( 
                CONCAT(MAKEDATE(year, day), ' ', '14:00:00'),
                CONCAT(MAKEDATE(year, day), ' ', '15:00:00'),
                'ahmedsami3@gmail.com', '14:00:00','15:00:00'
                );
        END IF;
        SET day = day + 1;
    END WHILE;
END;
//
CALL create_date_for_year(2022);

select *
from appointment 
where appo_date_end - appo_date_start = 10000;

insert into verification
values ('4','akramsaber30@gmail.com','123456');

select * from 
user_rate;

update user_rate
set user_rate = ('4' + user_rate) /2 
where User_User_email = 'akramsaber30@gmail.com' ;

insert into user_rate values (('4' + user_rate) /2 , 'akramsaber30@gmail.com' , 'client');

 


DROP PROCEDURE IF EXISTS create_date_for_year;
DELIMITER //
CREATE PROCEDURE create_date_for_year (IN year INT ,IN Photographer_User_User_email char)
BEGIN

   DECLARE day INT DEFAULT 1;
   SET day=180;
   WHILE day < 366 DO
       IF WEEKDAY(MAKEDATE(year, day)) NOT IN (3,4) THEN -- skip thursday and friday
           INSERT INTO available_time (available_start_time, available_end_time , Photographer_User_User_email , work_time_start, work_time_end)
           VALUES (
               CONCAT(MAKEDATE(year, day), ' ', '$work_time_start'),
               CONCAT(MAKEDATE(year, day), ' ', '$work_time_end'),
               '$Photographer_User_User_email', '$work_time_start','$work_time_end'
             );
       END IF;
       SET day = day + 1;
   END WHILE;
END;
//