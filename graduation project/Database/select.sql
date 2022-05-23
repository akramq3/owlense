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


select  appo_date_start , appo_date_end
from appointment
inner join available_time on Photographer_User_User_email = photographer.User_User_email
where Photographer_User_User_email in(
available_start_time,available_end_time
from available_time
 )
;


