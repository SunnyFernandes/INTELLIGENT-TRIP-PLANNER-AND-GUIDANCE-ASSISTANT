from flask import Flask, flash, jsonify, redirect, render_template, request, session, url_for
from tempfile import mkdtemp
from werkzeug.exceptions import default_exceptions, HTTPException, InternalServerError
from werkzeug.security import check_password_hash, generate_password_hash
from datetime import datetime,date
from flask_session import Session
from flask_sqlalchemy import SQLAlchemy
from flask_mysqldb import MySQL
import uuid
from functools import wraps
from datetime import datetime
from nav_sangna import *
from itinerary_algo import *
import mysql.connector


app = Flask(__name__)

app.secret_key = 'super secret key'
app.config['SESSION_TYPE'] = 'filesystem'
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'travel_buddy'
 
mysql = MySQL(app)
# Ensure templates are auto-reloaded
app.config["TEMPLATES_AUTO_RELOAD"] = True
# Ensure responses aren't cached
if app.config["DEBUG"]:
    @app.after_request
    def after_request(response):
        response.headers["Cache-Control"] = "no-cache, no-store, must-revalidate"
        response.headers["Expires"] = 0
        response.headers["Pragma"] = "no-cache"
        return response
#Configure session to use filesystem (instead of signed cookies)

# configure session to use filesystem (instead of signed cookies)
app.config["SESSION_FILE_DIR"] = mkdtemp()
app.config["SESSION_PERMANENT"] = False
app.config["SESSION_TYPE"] = "filesystem"
app.config["PREFERRED_URL_SCHEME"] = 'https'
app.config["DEBUG"] = False
Session(app)

# @app.route('/')
# def index():
#     return render_template('selector.html')

@app.route('/')
def home():
    cursor = mysql.connection.cursor()
    cursor.execute('''SELECT * FROM `recommendations` WHERE rec_id LIMIT 3;''')
    existing_user1=cursor.fetchall()
    return render_template('/Travelbuddycustomer/home.html', recommendations = existing_user1)

@app.route('/itinerarycreate')
def itinerarycreate():
    return render_template('itinerarycreate.html')

@app.route('/signup')
def signup():
    return render_template('/Travelbuddycustomer/signup.html')

@app.route('/profile_edit')
def profile_edit():
    return render_template('/Travelbuddycustomer/profile_edit.html')

@app.route('/login', methods=['POST'])
def login():
    # Check user credentials and log in
    if request.method == "GET":
        return render_template("register.html") #CHECK THIS FILE NAME LATERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    else:
        username= request.form.get("emailcheck")
        password=request.form.get("passwordcheck")
        cursor = mysql.connection.cursor()
        cursor.execute('''SELECT * FROM customer WHERE email=%s and pass=%s; ''',[username,password])
        existing_user=cursor.fetchone()
        cursor.execute('''SELECT * FROM `recommendations`;''')
        existing_user1=cursor.fetchall()
        if not existing_user:
            return render_template("error.html",error="Incorrect Email Or Password")
        session['logged_in'] = True
        return render_template('/Travelbuddycustomer/home.html', users=existing_user, recommendations=existing_user1)
        # return redirect(url_for('home'))

@app.route('/csignup', methods=['POST'])
def csignup():
    if request.method == "GET":
        return render_template("register.html") #CHECK THIS FILE NAME LATERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    else:
        fname= request.form.get("fname")
        lname= request.form.get("lname")
        gender= request.form.get("gender")
        email= request.form.get("email")
        phone= request.form.get("phone")
        password1=request.form.get("password")
        password2=request.form.get("cpassword")
        cursor = mysql.connection.cursor()
        cursor.execute('''SELECT * FROM customer WHERE email=%s and pass=%s; ''',[email,password1])
        existing_user=cursor.fetchone()
        

        if existing_user:
            return render_template("error.html",error="This email has laready been used for another account. Please use another email.")


        elif password1 != password2:
            return render_template("error.html",error="Passwords do not match")


        else:
            #CHECK THIS THING LATER BECAUSE GENDER IS NOT ADDED IN THE SIGN IN FORM------------------------------------------------------
            # hashed_password=generate_password_hash(password2, method='pbkdf2:sha256', salt_length=8)
            cursor = mysql.connection.cursor()
            cursor.execute('''INSERT INTO `customer` (`fname`, `lname`, `gender`, `email`, `phone`, `pass`, `cpass`) VALUES(%s,%s,%s,%s,%s,%s,%s)''',(fname,lname,gender,email,phone,password1,password2))
            mysql.connection.commit()
            cursor.execute('''SELECT * FROM customer WHERE email=%s and pass=%s; ''',[email,password1])
            returned_user=cursor.fetchone()
            session["cust_id"] = returned_user[0]
            flash('Registered!')
            cursor.close()
            return redirect("/signup")

@app.route("/logout")
def logout():
    session.clear()
    return redirect("/")

# ADMIN SIDE 
@app.route('/admin')
def admin():
    user_data = session.get('user_data')
    if user_data:
        return render_template('/Travelbuddyadmin/template/admin_index.html', users=user_data)
    return render_template('/Travelbuddyadmin/template/samples/login.html')

@app.route('/ad_login', methods=['POST'])
def ad_login():
    # Check user credentials and log in
    # if request.method == "GET":
    #     return render_template("register.html") #CHECK THIS FILE NAME LATERRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
    user_data = session.get('user_data')
    if user_data:
        return render_template('/Travelbuddyadmin/template/admin_index.html', users=user_data)
    else:
        username= request.form.get("email")
        password=request.form.get("pass")
        cursor = mysql.connection.cursor()
        cursor.execute('''SELECT * FROM `admin` WHERE email=%s and pass=%s ''',[username,password])
        existing_user=cursor.fetchone()
        # -------------------------------------------------------------------------------------------------------------
        cursor.execute('''SELECT * FROM `customer`''')
        existing_user1=cursor.fetchall()

        cursor.execute('''SELECT * FROM `booking` INNER JOIN itinerary ON itinerary.itinerary_id = booking.itinerary_id;''')
        existing_user2=cursor.fetchall()

        cursor.execute('''SELECT * FROM `flights`;''')
        existing_user3=cursor.fetchall()

        cursor.execute('''SELECT * FROM `trains`;''')
        existing_user4=cursor.fetchall()

        cursor.execute('''SELECT * FROM `bus`;''')
        existing_user5=cursor.fetchall()

        cursor.execute('''SELECT * FROM `car_rental`;''')
        existing_user6=cursor.fetchall()

        cursor.execute('''SELECT * FROM `hotels`;''')
        existing_user7=cursor.fetchall()
        #-----------------------------------------------------------------------------------------------
        if not existing_user:
            return render_template("error.html",error="Incorrect Email Or Password")
        session['logged_in'] = True
        session['user_data'] = existing_user
        session['customer_details'] = existing_user1
        session['bookings'] = existing_user2
        session['flight'] = existing_user3
        session['train'] = existing_user4
        session['bus'] = existing_user5
        session['rental_vehicle'] = existing_user6
        session['hotel'] = existing_user7
        return render_template('/Travelbuddyadmin/template/admin_index.html', users=existing_user)
        # return redirect(url_for('home'))

@app.route('/admin_index')
def admin_index():
    user_data = session.get('user_data')
    if user_data:
        return render_template('/Travelbuddyadmin/template/admin_index.html', users=user_data)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/customer_details')
def customer_details():
    user_data = session.get('user_data')
    customer_details = session.get('customer_details')
    if user_data:
        return render_template('/Travelbuddyadmin/template/customer_details.html', users=user_data ,customer_details=customer_details)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/bookings')
def bookings():
    user_data = session.get('user_data')
    bookings = session.get('bookings')
    if user_data:
        return render_template('/Travelbuddyadmin/template/bookings.html', users=user_data, bookings=bookings)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")
   
@app.route('/vendor_details')
def vendor_details():
    user_data = session.get('user_data')
    if user_data:
    # VENDOR TABLE NOT THERE-------------------------------
        return render_template('/Travelbuddyadmin/template/vendor_details.html', users=user_data)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/flight')
def flight():
    user_data = session.get('user_data')
    flight = session.get('flight')
    if user_data:
        return render_template('/Travelbuddyadmin/template/pricing/flights.html', users=user_data, flight=flight)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/train')
def train():
    user_data = session.get('user_data')
    train = session.get('train')
    if user_data:
        return render_template('/Travelbuddyadmin/template/pricing/trains.html', users=user_data, train=train)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/bus')
def bus():
    user_data = session.get('user_data')
    bus = session.get('bus')
    if user_data:
        return render_template('/Travelbuddyadmin/template/pricing/bus.html', users=user_data, bus=bus)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/rental_vehicle')
def rental_vehicle():
    user_data = session.get('user_data')
    rental_vehicle = session.get('rental_vehicle')
    if user_data:
        return render_template('/Travelbuddyadmin/template/pricing/rentalvehicle.html', users=user_data, rental_vehicle=rental_vehicle)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")

@app.route('/hotel')
def hotel():
    user_data = session.get('user_data')
    hotel = session.get('hotel')
    if user_data:
        return render_template('/Travelbuddyadmin/template/pricing/hotels.html', users=user_data, hotel=hotel)
    else:
        return render_template("error.html", error="Admin not logged in <a href='/admin'>Click Here To Login</a>.")
 
# --------------------------------------------------------------------------
@app.route('/submit', methods=['POST'])
def submit():
    global form_data
    org = request.form['source']
    dest = request.form['destination']
    start = request.form['arrival_date']
    end = request.form['departure_date']
    age_range = request.form['ageGroup']
    travel_type = request.form['travel_type']
    trip_type = request.form['trip_type']
    nots = request.form['numTravelers']
    budget = request.form['budget']
    
    print(start)
    print(end)
    print(budget)
    cal_budget = int_budget(budget) 
    days = calculate_days(start,end)
    print(days)
    percentage = percentage_calculator(cal_budget)
    print(percentage)
    transportation = transportation_avaliable(org, dest,percentage,cal_budget,int(nots))
    print(transportation)
    # FOR NOW LOCATION ID = 10
    loc_id =10
    hotel = hotel_available(loc_id,int(percentage),days)
    print(hotel)
    print("hehehehe",hotel[1][5])
    # cal_budget = cal_budget-(int(transportation[0]) + int(hotel[0])) #THIS LINE WILL WORK LATER.. SINCE IDK THE RIGHT ARRAY INDEX FOR PRICE
    print(cal_budget)

    act = get_user_data(age_range,travel_type,trip_type,days,budget)
    print(act)
    print(act[0][5])
    # act_up = []
    # act_up.append(act[0][5])
    # activities = act_up
    # print(act_up)
    # input_string = []
    input_string = str(act[0][5])
    activities = extract_act(input_string)
    print(activities)
    # UNCOMMENT THE ABOVE 4 TIME AND ONCES THAT EXTRACTION AGLO IS WORKING----------------------------------------------AND COMMENT THE BELOW LINE---------
    # activities = ["Sightseeing","BeachActivities", "Nightlife", "Shopping"]
    arrive = transportation[1][4]
    print(arrive)
    location = int(hotel[1][5])
    creating_days = creating_data(activities,days,trip_type,location,arrive)
    # act_data = activities_data(sample)
    # percentage = percentage_calculator(float(budget))
    # transportation = transportation_avaliable(org, dest,percentage,int(budget),int(nots))
    # hotel = hotel_available(dest,int(percentage),days)
    # budget = int(budget)-(int(transportation[0]) + int(hotel[0]))#-------------------------------------------------------------------------
    # -------------------------------------------------------------------------------------------------------------------------------------
    
    
    # total_per_day = per_day_expense(trip_type,int(nots),days,int(budget))
    # if type(total_per_day) == int:
        # budget = int(budget)-int(total_per_day)
    

    # -------------------------------------------------------------------------------------------------------------------------------------
    # car = car_rental_available(dest,budget,days) #if you are commenting the previous two lines and add this line in the if statement

    # gptPrompt(start,end,travel_type,nots,trip_type,budget)
    # -------------------------------------------------------------------------------------------------------------------------------------

    # return render_template('result.html', hotel=hotel, creating_days=creating_days) ## --TO PRINT DATA BACK TO HTML
    # return f"Submitted Data: Org - {org}\n, dest - {dest}\n days = {days} {percentage} {transportation} {hotel} {budget} {car}\n"
    return f"Submitted Data: Org - {org}\n, dest - {dest}\n days = {days} {act} {creating_days}\n"
    # else:
    #     return f"Please Increase your budget"



if __name__ == '__main__':
    app.run(debug=True)
    # app.run()
