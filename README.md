# FindFolk
Team: Asim Poddar & Zulkifl Arefin

Project made for CS 3663 - Databases

FindFolk
Installation:
1) Extract files from zip file
2) Move extracted folder into database folder (Ex. WAMP)
3) Run on http://localhost/find_Folks
4) Enjoy

Using the system:
- You can create an account, login or view pubic information at the main screen
- Create a group or event, RSVP to an event, view most popular events and many other features
  

Project Work Breakdown:

Mandatory Features:
Part 1 -> Zulkifl / Asim
Part 2 -> Zulkifl / Asim
View public info -> Zulkifl / Asim
Login -> Zulkifl / Asim
Homepage -> Zulkifl / Asim
Upcoming Events -> Zulkifl / Asim
RSVP for event -> Zulkifl / Asim
Create an event -> Zulkifl / Asim
Logout -> Zulkifl / Asim

Extra Features:
Most popular groups -> Zulkifl / Asim
People with same interest -> Zulkifl / Asim
Join groups -> Zulkifl / Asim
Top five visited events -> Zulkifl / Asim

Extra Feature Descriptions:

1) Create Groups: This feature will allow users to create and establish groups based on interests. People with the same interests will be offered the option to join a related group. Doing so will permit users within groups to go to events together, create more friends, and have easier access and notification of group events. 

2) Add Friends: This feature allows the user to select other fellow users and establish them as friends. Doing so allows them to view which events and groups they are associated with. They can view upcoming events they are going to in and will promote going to events with friends, making the process of choosing events easier.

3) Grant Authorization: This feature is set for users who are looking to edit/modify/create an event or group. This application will provide authorized users with permission and access to do so.

4) Revoke Authorization: This feature is set for users who are looking to edit/modify/create an event or group. This application will revoke permissions of non-authorized users with access to do so.

__________________________

List of Files:

addFriends.php -> Allows users to select other users and link to them as Friends
avgRating.php -> Produces the average attendee rating for individual events which users can view upon searching about an event
createAccount.php -> This source allows the user to create an account with a respective username and password if they already do not have one
createEventForm.php -> This is a form which users can use and fill out in order to create and register an event
createEvent.php -> This is what initializes and creates the event
createGroup.php -> This allows users to create a group which can be based on interests; other users are permitted to join the group
dbh.php -> This provides the connection to the database on localhost
displayEventsForRegistration.php -> Permits display and viewing of the events so that other users can join events
eventSignup.php -> Allows users to signup for the events
grantAuthorization.php -> If a users account is cleared to make changes/edits, Authorization is given with editing permissions
index.php -> This provides localhost with the initial login/signup display screen
login.php -> If a user already has an account, they can login to their account to access the site
logout.php -> When a user is done using their account for the session, they can access this feature to log them out of the system at the end of the session
rateEvent.php -> Allows users to rate an event which has been hosted
revokeAuthorization.php -> If a user is not authorized to do an action or access a feature, an error is displayed where authorization is revoked and they are notified that they do not have permission to conduct those actions
searchEventsOfInterest.php -> Allows users to search for a list of Events based on interests inputted by the users
searchViaDate.php -> Allows users to enter in a time frame which the database will check against, and will be able to display which events are available
searchViaInterest.php -> Allows users to input a interest and search for events with matching interests listed
seeFriendEvents.php -> Allows users to view all the events their friends have signed up for
signup.php -> If the user does not already have an account, this allows the user to signup for one
userProfilePage.php -> Is a display page for the users which shows all the information behind the user (ie. interests)
viewPublicInfo.php -> Allows users to view public information upon login
viewUpcomingEvents.php -> Allows logged in users to view upcoming events

MAIN QUERIES USED

When an user inputs an interest which is not part of the interest table:
INSERT INTO interest (interest_name) VALUES (?) // Adds interest into interest table
INSERT INTO memberinterest (interest_name, username) VALUES (?, ?) // Adds interest and Username into memberinterest

When an user inputs an interest which is already part of the interest table:
INSERT INTO memberinterest (interest_name, username) VALUES (?, ?) -> Adds interest and username into memberinterest

This portion checks whether the interest is already in the interest table:
SELECT * FROM interest WHERE interest_name=?

This portion is to check whether the user is authorized or not to create an event:
SELECT group_id FROM groupuser WHERE username=? AND authorized=1 -> Authorized in our case is 1, not authorized is 0 or not in table

This portion is to check whether the user is authorized to create an event for a specific group:
SELECT group_id FROM groupuser WHERE group_id=? AND username=? AND authorized=1

This portion is to check whether they are authorized to modify/edit the event for a specific group:
SELECT group_id FROM groupuser WHERE group_id=? AND username=? AND authorized=1

This portion creates an event based on the user’s entered parameters:
INSERT INTO an_event (event_id, title, description, start_time, end_time, group_id, lname, zip) VALUES (?,?,?,?,?,?,?,?)

This portion checks to see whether the user has an interest or not:
SELECT * FROM memberinterest WHERE username=?

This portion gets an event_id from an event name which the user has entered:
SELECT event_id FROM an_event WHERE event_id=?

This portion creates an account for new users based on username, first name, and last past:
INSERT INTO member values (?,?,?,?,?)

This portion checks whether the username is valid and not taken:
SELECT * FROM member WHERE username=?

This portion checks and validates the location for an event created:
SELECT lname,zip FROM location WHERE lname=? and zip=?

This portion selects all possible groups which a user can join:
SELECT a_group.group_id, group_name, count(*) as members, description FROM groupuser , a_group WHERE authorized=1 and groupuser.group_id=a_group.group_id group by group_id order by members DESC

This portion officially allows the user to join the group:
INSERT INTO groupuser values(?,?,0)

This portion checks whether the group a user is trying to join has an existing valid group_id:
SELECT * FROM a_group WHERE group_id =?

This portion validates whether or not a user is authorized to edit/modify an event:
SELECT group_id FROM groupuser WHERE group_id=? AND username=? AND authorized=1

This portion validates the location while editing an event:
SELECT lname,zip FROM location WHERE lname=? and zip=?

This portion updates specific events with modified information which the user has input:
UPDATE an_event SET title=?, description=?, start_time=?, end_time=?, group_id=?, lname=?, zip=? WHERE event_id=?

This portion selects those events which are most popular:
SELECT event_id, title, count(*) as RSVP, description FROM eventuser natural join an_event WHERE rsvp=1 group by event_id order by RSVP DESC LIMIT 5

This portion selects those groups which are most popular:
SELECT a_group.group_id, group_name, count(*) as members, description FROM groupuser , a_group WHERE authorized=1 and groupuser.group_id=a_group.group_id group by group_id order by members DESC

This portion checks the username and password for someone trying to log into their account:
SELECT * FROM member WHERE username=? and password=?

This portion allow an user to RSVP into a specific event:
INSERT INTO eventuser (`event_id`, `username`, `rsvp`, `rating`) VALUES (?, ?, '1', '-1') -> -1 is default rating

This portion selects all the possible events which an user can RSVP to:
SELECT event_id, title, description, start_time, end_time, zip FROM an_event

This portion selects all other users with the same interests:
SELECT firstname, lastname, interest_name FROM member natural join memberinterest WHERE interest_name = ? AND username <> ?

This portion validates the event_id when an user is trying to RSVP for an event:
SELECT event_id FROM an_event WHERE event_id=?

This portion selects events which fall within a specified time range:
SELECT * FROM an_event WHERE start_time>=? and end_time<=?

This portion selects groups with a specified interest:
SELECT * FROM a_group natural join groupinterest WHERE interest_name=?

This portion selects an user’s upcoming events:
SELECT event_id, title, description, start_time, end_time, lname, zip FROM an_event natural join eventuser WHERE username=? and rsvp=? AND end_time > CURDATE()
