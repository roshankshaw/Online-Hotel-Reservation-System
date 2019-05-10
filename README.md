# Online-Hotel-Reservation-System
Its a database management project where focus is laid on best design principles to optimize the database operations


Problem Statement:-

    1. To design a website to facilitate automatic and computerized reservation of rooms in hotel by customers.
    2. The application should create an interface for the interaction of two communities, i.e., Customers(who wish to book rooms online) and hotel administrators (who wish to allow the online booking of rooms of their hotel).
    3. Both administrators and customers should provide essential personal details such as name, email id, aadhar number, age, but administrators should provide the additional mandatory details of hotel they are going to represent.
    4. The administrators are the ones who provide information about the availability of rooms in their hotels. Each hotel is uniquely identified by Hotel Identity Number provided by government of India.
    5. Each Hotel has one representative administrator, say admin, who provides the details  of hotel(hotel name, description, location) and also provides the details of the additional facilities available, i.e., Meals and Swimming Pool. 
    6. There can be no admin who does not represent a hotel and a hotel can be associated with only one admin, who is authorized to provide details of hotels and its rooms.
    7. The rooms are either single bed or double bed with luxury type of deluxe or super deluxe. The room type and luxury should be exclusively mentioned for customers before booking. They have a base price per day which is to be mentioned. Extra charges  of added facilities – extra beds, meals and swimming pools, will be additional and be taken by hotel at the time of check-out. It won’t be added to the booking price.
    8. The information about availability of a rooms of particular type and luxury can be added, updated and deleted by the admin as per hotel rules. The admin is responsible for all information regarding the rooms of his hotel. Each room is associated with a hotel and no rooms can exist without an associated hotel and its admin. 
    9.  The Customer should login to his account and search hotels on the basis of location.
    10. He should get essential details of the hotel and its rooms. If interested and rooms being available, he should be able to book it online.
    11. Before booking he should provide essential details such as check-in date, name of the customer for whom it is booked, number of days for which rooms are booked and number of rooms being booked.
    12. After booking, he receives booking transcript, which he can use while check-in or for future reference. The Customer can book as many rooms as he wants until the rooms are available. The transcript provides all necessary details about booking.
Constraints:-

    1. The website relies on admin about the information of the rooms available for booking online.
    2. The database of website ensures that it is the responsibility of admin to handle the availability data about booking. i.e., if a person has booked a room for two days then, the rooms remain unavailable even after those two days of stay until admin wishes to put its status back to available online.
    3. Changes made by admin in room details after it is booked by user will not be reflected in booking details’ access to the user.
    4. Check-in date should be greater than booking date.
    5. No of rooms for booking should not exceed availability of rooms

Introduction

The main aim & objective of this Hotel Room Booking System Project is to give simple application which provides all facilities like room booking, room class type etc.
Both user - customers and admins have different roles to play and enjoy separate freedom to use the product.
These are the below methods used in this project:


Common to both customers and admins –

    • Sign up/Sign in
    • Add personal details
    • Access to personal profile
    • Logout 
    
For Customers only

    • Search hotels by Entering name of city/area/locality
    • Book hotel room by entering preferences such as room type , duration of stay(min. 1 day) and no. of rooms
    • Payment
    • Review bookings
For Admin Only

    • Add hotel details
    • Add rooms with details such as no. of rooms to be made available for booking, whether facilities such as meals, swimming pools are available or not, specify room luxury out of (Deluxe/Super Deluxe), type (single bed/double bed), extra bed facility and base cost of each room.
    • Edit room details



Assumptions Made as per Client Requirements:

    • Each hotel has only one admin who will represent it in this Hotel Room Booking System. The same constraint applies to an admin who will have only one hotel to represent and manage.
    • Each booking has a separate booking ID for future reference.
    • Changes made by admin in room details after it is booked by user will not be reflected in booking details’ access to the user.
    • Extra beds facility availing and its associated additional cost payment can be done at the time of check-in at the booked Hotel. 
    
Features and Control Flow:
Sign Up 

    • Description: This “Sign up” function allows a user register as a Customer or Admin.
    • AS A CUSTOMER 
      Inputs: First Name, Last Name, Email ID, Password, Confirm Password, UIDAI Aadhaar No., Date of Birth
    • AS AN ADMIN
        Inputs: First Name, Last Name, Email ID, Password, Confirm Password, UIDAI Aadhaar No., Date of Birth, Hotel Name,            Location, Hotel Description and Facilities(Meals and Swimming Pools),
 


BOTH CUSTOMER AND ADMIN   

    • Outputs:  Prompt message showing user has been registered as a customer. All user details are stored in Customer relation in User database.
    • Source: From the sign up button.
    • Pre-condition: The user has entered valid Date of Birth, Password and Confirm password matches and User has entered data in all fields.
    • Post condition: The user can proceed to Sign In as a Customer.
    • Side-effects: None.
Sign In

    • Description: This “Sign in” function allows a registered user to log into account
    • Inputs: The user enters Email ID and Password to validate his details  
    • Outputs: Webpage where user gains access to his account.  
    • Source: Details of user which are stored in User relation are used as source.
    • Pre-condition: The user has entered valid Email ID and Password. 
    • Post condition: The user can proceed to search and book hotels.
    • Side-effects: Email ID and Password values are matched with those stored in User relation. If they are found valid then other details such as User ID, Date of Birth, Bookings, Name and UIDAI AAdhar No. are fetched so that they can be reviewed in User Profile.

My Profile

    • Description: This “My Profile” function allows a registered user to review his profile
    • Inputs: My profile button  
    • Outputs: Webpage where user can see his User ID, Name and Email ID.  
    • Source: Details of user which are stored in User relation are used as source.
    • Pre-condition: None 
    • Post condition: None
    • Side-effects: Details such as User ID Name and Email ID are fetched so that they can be reviewed in User Profile.
Features pertaining to only Customer

Search Hotel

    • Description: This “Search” function allows a Customer to search for hotels
    • Inputs: The user enters City/Area/Locality  
    • Outputs: Webpage where customer can see hotel name.  
    • Source: Details of hotels which are stored in Hotel relation are used as source.
    • Pre-condition: None 
    • Post condition: The user can proceed to book hotel rooms.
    • Side-effects: Hotel details such as name, description and location and also room details such as facilities are fetched from Hotel and Room relation
Book Hotel

    • Description: This “Book” function allows a Customer to book for hotel rooms after entering certain details.
    • Inputs: Selection of Room type, entering duration of stay and no. of rooms.  
    • Outputs: Total cost evaluation and  payment method  
    • Source: Details of customer which are stored in User relation combined with availability of rooms, room luxury, hotel details from Room and Hotel relation are used as source.
    • Pre-condition: Minimum duration of stay can be 1 day. Each customer can book multiple rooms of a hotel at a time. 
    • Post condition: The user can proceed to choose payment method: Pay at Hotel or Net Banking.
    • Side-effects: User details are automatically fetched and displayed and payable amount is evaluated after entering duration and no of rooms.
Payment

    • Description: This “Payment” function allows a Customer to pay for booking and confirm the booking.
    • Inputs: Selection of payment method: Pay at hotel or Net Banking. If pay at hotel is chosen booking is confirmed, else user is required to enter his banking details.  
    • Outputs: Total cost evaluation and payment confirmation.  
    • Source: Booking details.
    • Pre-condition: User needs to choose payment method and must confirm payment if net banking is his choice
    • Post condition: Nonce
    • Side-effects: Booking details are automatically  fetched and total payable amount is shown

My Bookings

    • Description: This “My Bookings” function allows a Customer to review history of bookings.
    • Inputs: My Bookings button.
    • Outputs: Webpage displaying list of all bookings in serial order. User can also view transcripts of all bookings
    • Source: Booking details such as Booking Id, Booking Name, Date, Duration, no. of rooms, luxury and Payable amount are fetched.
    • Pre-condition: None
    • Post condition:  User has no control or freedom to manipulate/edit past bookings
    • Side-effects: Booking details are automatically fetched and shown in form of transcripts.

Features pertaining to only Admin

Add Rooms

Description:
This “Add Rooms” function allows a hotel admin to add room details to his hotel.
  Inputs: Room type, luxury, no of rooms available, extra beds facility (yes/no) and base cost.
  Outputs: Confirm addition of details
  Source: Hotel details are used from Hotel relation to add rooms to it.
  Pre-condition: Each hotel must have at least 1 room available for booking. Other details’ entry is mandatory.
  Post condition:  Admin has full control and freedom to manipulate/edit room details provided that there should be at least   1 room available for booking.
  
The Entity-Relationship Model:
Normalisation:
Entities Hotel and Facilities.

Attributes of both Hotel and Facilities can be joined to form a relation HOTEL, containing Hotel_id as primary key and User_Id (of admin) as a foreign key.
Following Functional Dependencies can be formed from the relation HOTEL:

    1. Hotel_id -> (Hotel_name,Location,Description,Meals,Swimming_pools)
    2. Hotel_id ↔ User_id
Attribute closure of Hotel_id:

  Hotel_id+ →( User_id, Hotel_name, Location, Description, Meals, Swimming_pools)
Attribute closure of User_id:

  User_id+ →(Hotel_id, Hotel_name, Location, Description, Meals, Swimming_pools)
In functional dependencies above, Hotel_Id  and User_Id are super keys which can uniquely identify all attributes.
Therefore the relation HOTEL is in BCNF (Boyce-Codd Normal Form). 

Entity Room

Features of each room can be attributed with Hotel_Id, Room_type, Luxury, Base_cost, Extra_beds and No_of_rooms in a ROOM table. ROOM is a weak entity which has no primary key of its own and hence has Hotel_id as its prime attribute to uniquely identify each and every other record.

This is so because; logically each Hotel has several rooms of categorized features defining whether facility of extra bed addition at the time of checking in is available and selection of luxury and room types.

Base_cost is the price that an admin enters for each of the rooms and will purely depend on the norms of hotels’ regulations.

Following Functional Dependencies can be formed from the relation Room:

    1. (Hotel_id,Room_type, Luxury)  -> (Base_cost, Extra_beds and No_of_rooms)
Attribute closure of Hotel_id:

Hotel_id+ →( Hotel_id ,Room_type, Luxury, Base_cost, Extra_beds and No_of_rooms)

In functional dependencies above, Hotel_Id  is a super key (also a Prime Attribute) which can uniquely identify all attributes.

Therefore the relation ROOM is in BCNF (Boyce-Codd Normal Form) 

Entity Bookings

Bookings will maintain a record of all room bookings done by user including details such as Booking_id, Hotel_id, User_id, No.of_days, Check_in_date, Room_type, luxury and cost.
Booking_id, No.of_days stay, room type, and luxury and cost details will be fetched and shown in form of transcripts as and when required by the user.
Following Functional Dependencies can be formed from the relation Bookings:

    1. Booking_id → (Hotel_id, User_id, No.of_days, Check_in_date, Room_type, luxury,cost)
Attribute closure of Booking_id:

    2. Booking_id + →( Booking_id, _id, User_id, No.of_days, Check_in_date, Room_type, luxury,Cost)

Relation Bookings  is in BCNF as Booking_id is the only super key identifying all other attributes.



Entity USER

Each user – Admin and customer has different roles and though their information has fairly different constraints, their data will be maintained in USER relation. 

Following Functional Dependencies can be formed from the relation USER:

    1. User_id → (First_name,Last_name,Date_of_Birth,Email_Id,Role,Ph_No,Password) i.e. User_id →R(USER) 
    2. Email_ID →(User_Id)
    3. Ph_No → (User_id)
Each of the above attributes are functionally dependant on prime keys User_id, Email_ID and Ph_no. Hence Relation above is in BCNF.




