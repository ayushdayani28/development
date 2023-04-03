import React, { useState } from "react";

const ContactForm = () => {
  const [status, setStatus] = useState("Submit");
  const [showForm, setShowForm] = useState(false);
  const handleSubmit = async (e) => {
    e.preventDefault();
    setStatus("Sending...");
    const { name, email, message } = e.target.elements;
    let details = {
      name: name.value,
      email: email.value,
      message: message.value,
    };
    let response = await fetch("http://localhost:7080/contact", {
      method: "POST",
      headers: {
        "Content-Type": "application/json;charset=utf-8",
      },
      body: JSON.stringify(details),
    });
    setStatus("Submit");
    let result = await response.json();
    alert(result.status);
  };
  function handleButtonClick() {
    setShowForm(!showForm);
  }
  return (
    <div style={{zIndex:'1'}}>
        <button onClick={handleButtonClick} className='btn btn-4' id='contact-form'>Contact</button>
        {showForm && 
            <div className="testing">
                <form onSubmit={handleSubmit} className={showForm ? 'show' : ''}>
                <div>
                    <label htmlFor="name"  style={{display:'block', fontFamily:'JetBrainsMono'}}>Name:</label>
                    <input type="text" id="name" required />
                </div>
                <div>
                    <label htmlFor="email"  style={{display:'block'}}>Email:</label>
                    <input type="email" id="email" required />
                </div>
                <div>
                    <label htmlFor="message"  style={{display:'block'}}>Message:</label>
                    <textarea id="message" required />
                </div>
                <button type="submit">{status}</button>
                </form>
            </div>
            }
    </div>
  );
};

export default ContactForm;