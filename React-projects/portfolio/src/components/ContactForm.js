import React, { useState } from "react";

const ContactForm = () => {
  const [status, setStatus] = useState("Submit");
  const [showForm, setShowForm] = useState(false);
  const [data, setData]=React.useState({'name':'','email':'',"message":''});
  const effectRef=React.useRef(null)
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
  function handleOnChange(key, e) {
    setData(prevState => ({ ...prevState, [key]: e.target.value }))
  }
  return (
    <div style={{zIndex:'1'}}>
        <button onClick={handleButtonClick} className='btn btn-4' id='contact-form'>Contact</button>
        {showForm && 
            <div className="testing" ref={effectRef}>
                <form onSubmit={handleSubmit} className={showForm ? 'show' : ''}>
                    <div>
                        <label htmlFor="name">Name:</label>
                        <input type="text" id="name" required onChange={(e)=>handleOnChange('name', e)} value={data.name} />
                    </div>
                    <div>
                        <label htmlFor="email">Email:</label>
                        <input type="email" id="email" required onChange={(e)=>handleOnChange('email', e)} value={data.email} />
                    </div>
                    <div>
                        <label htmlFor="message">Message:</label>
                        <textarea id="message" required onChange={(e)=>handleOnChange('message', e)} value={data.message} />
                    </div>
                    <button type="submit">{status}</button>
                </form>
            </div>
            }
    </div>
  );
};

export default ContactForm;