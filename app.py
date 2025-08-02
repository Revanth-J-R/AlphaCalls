from flask import Flask, render_template, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from datetime import datetime
from flask import Flask, request, jsonify
import send_email  # Import your email sending code here



app = Flask(__name)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///pizza_shop.db'
db = SQLAlchemy(app)

# Define the Bill model (as shown in the previous code)

# ... Your existing email sending route ...

app = Flask(__name__)

@app.route('/send_email', methods=['POST'])
def send_email():
    data = request.json
    email = data['email']

    # Use your email sending code to send the email
    result = send_email.mail2user(email)

    return jsonify({'message': result})

if __name__ == '__main__':
    app.run()


# Pizza shop routes:

@app.route('/')
def menu():
    # Fetch menu items from your database or any other source
    menu_items = [
        {'name': 'Pizza Margherita', 'price': 12.99},
        # Add more menu items here
    ]
    return render_template('menu.html', menu_items=menu_items)

@app.route('/create_bill', methods=['POST'])
def create_bill():
    # Add the logic to create a bill here

@app.route('/bill/<int:bill_id>')
def bill(bill_id):
    # Add the logic to display an individual bill here

@app.route('/orders_taken')
def orders_taken():
    # Add the logic to list orders taken for the day here

if __name__ == '__main__':
    app.run(debug=True)


# Recommendation route to suggest pizzas based on common combinations
@app.route('/recommend_pizzas', methods=['POST'])
def recommend_pizzas():
    customer_order = request.json['order']
    recommendations = []

    # Loop through the pizza_combinations and suggest pizzas that frequently appear together
    for combo, count in pizza_combinations.items():
        combo_items = combo.split(',')
        if all(item in customer_order for item in combo_items):
            recommendations.append({
                'combo': combo_items,
                'count': count
            })

    # Sort the recommendations by count in descending order
    recommendations = sorted(recommendations, key=lambda x: x['count'], reverse=True)

    return jsonify({'recommendations': recommendations})