import os
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from email.mime.application import MIMEApplication
def mail2user(tomid):
    # Email configuration
    mpwd ="ysla yaqk tvxc qpwa"
    sender_email = 'jrrevanth@gmail.com'
    receiver_email = tomid
    subject = "sub"
    message = "content"
    
    # SMTP server configuration
    smtp_server = 'smtp.gmail.com'
    smtp_port = 587  # Port for TLS encryption
    
    # Your email credentials (make sure to use app-specific passwords if required)
    smtp_username = 'jrrevanth@gmail.com'
    smtp_password = mpwd

    # Create the email message
    msg = MIMEMultipart()
    msg['From'] = sender_email
    msg['To'] = receiver_email
    msg['Subject'] = subject
    msg.attach(MIMEText(message, 'plain'))

    # Connect to the SMTP server and send the email
    try:
        server = smtplib.SMTP(smtp_server, smtp_port)
        server.starttls()
        server.login(smtp_username, smtp_password)
        server.sendmail(sender_email, receiver_email, msg.as_string())
        server.quit()
    except Exception as e:
        print('Email could not be sent. Error:', str(e))