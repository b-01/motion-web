import smtplib
import time

GMAIL_SERVER = "smtp.gmail.com"
GMAIL_PORT = 587
GMAIL_USERNAME = ""
GMAIL_PASSWORD = ""

BODY_TEMPLATE = """<!DOCTYPE html>
                    <html>
                        <head>
                            <title>Title of the document</title>
                        </head>
                        <body>
                            <h3>Motion detected!</h3>
                            <div>
                                <p>Date: %%DATE%%</p>
                                <p>Time: %%TIME%%</p>
                            </div>
                        </body>
                    </html>"""

def send_mail(recipient, subject, body):
    try:
        session = smtplib.SMTP(GMAIL_SERVER, GMAIL_PORT)
        session.ehlo()
        session.starttls()
        session.login(GMAIL_USERNAME, GMAIL_PASSWORD)

        headers = "\r\n".join(
                            [
                            "from: " + GMAIL_USERNAME,
                            "subject: " + subject,
                            "to: " + recipient,
                            "mime-version: 1.0",
                            "content-type: text/html"
                            ])

        content = headers + "\r\n\r\n" + body
        session.sendmail(GMAIL_USERNAME, recipient, content)
        session.close()
    except:
        return

def main():
    recipient = "[TODO]"
    subject = "Motion detected!"
    body = BODY_TEMPLATE \
            .replace("%%DATE%%", time.strftime("%Y / %m / %d")) \
            .replace("%%TIME%%", time.strftime("%H:%M:%S"))
    send_mail(recipient, subject, body)

if __name__ == "__main__":
    main()
