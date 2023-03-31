const express = require(`express`);
const cors = require('cors');
const nodemailer = require('nodemailer');
const app = express()
require('dotenv').config();

app.use(express.json());
app.use(cors());


const PORT = 7080

app.post('/contact', (req, res) => {
    const transporter = nodemailer.createTransport({
        service: "gmail",
        host: "smtp.gmail.com",
        port: 587,
        secure: false,
        auth: {
          user: process.env.EMAIL_USER,
          pass: process.env.EMAIL_PASS
        }
    });
  
    const { name, email, message } = req.body;
  
    const mailOptions = {
      from: process.env.EMAIL_USER,
      to: process.env.TO_USER,
      subject: `New message from ${name}`,
      text: `${message} ${email} `,
    };
  
    transporter.sendMail(mailOptions, (error, info) => {
      if (error) {
        console.error(error);
        res.status(500).json({ status: "error message not sent"});
      } else {
        console.log(`Email sent: ${info.response}`);
        res.status(200).json({ status: 'Message sent successfully' });
      }
    });
  });
  
  app.listen(PORT, () => {
    console.log('Server listening on port 7080');
    console.log(process.env.EMAIL_USER)
  });  