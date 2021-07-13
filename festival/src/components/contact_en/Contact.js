import React, { Fragment, useState } from "react";
import Navigation from '../navigation_en/Navigation'
import Footer from '../footer_en/Footer'
import Chargement from '../../img/chargement.gif'

const Contact = () => {

  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [message, setMessage] = useState("");
  const [error_result, setError_result] = useState("");
  const [color_error_form, setColor_error_form] = useState("");
  const [chargement, setChargement] = useState("none");
  // const recaptchaRef = React.createRef();
  
  // const erreur = document.querySelector('.form-message')


  const handleSubmit = (e) => {
    
    e.preventDefault();
    if(name != "" && email != "" && message != ""){
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-])/;

        if(email.match(mailformat)){
            // console.log("mailgood")
            sendFeedback("template_a34vo2a", {
                name,
                email,
                message,
            });
        }
        else{
          setColor_error_form("red")                 
          setError_result("Incorrect email format")
        }  
    }else{
      setColor_error_form("red")                 
      setError_result("Please fill in all the blanks")         
    } 
    };
  const sendFeedback = (templateId, variables) => {
    setChargement("")
    window.emailjs
      .send("service_h5mh0lp", templateId, variables)
      .then(() => {
        // console.log('success !');
        setName("");
        setEmail("");
        setMessage("");
        setColor_error_form("green")                 
        setError_result("E-mail sent")
        setChargement("none")
      })
      .catch(
        (err) =>
          document.querySelector('.form-message').innerHTML =
            "An error has occurred. Please try again.")
          };


  return (
      <Fragment>
          <Navigation />
    <div className="fond_contact">
    <form className="contact-form">
      <div className="contact_titre">Contact us</div>
      <div className="form-content">
        <input
          type="text"
          id="name"
          name="name"
          onChange={(e) => setName(e.target.value)}
          placeholder="nom *"
          value={name}
          autoComplete="off"
        />
     
     
        <div className="email-content">
          <input
            type="mail"
            id="email"
            name="email"
            onChange={(e) => setEmail(e.target.value)}
            placeholder="email *"
            value={email}
            autoComplete="off"
          />
        </div>
        <textarea
          id="message"
          name="message"
          onChange={(e) => setMessage(e.target.value)}
          placeholder="message *"
          value={message}
        />
      <input
        className="g-recaptcha"
        data-sitekey="6LfWXzQaAAAAAKu1xiQeRpTyedWGHLRbdlxrJeh3" 
        type="button"
        id="button"
        onClick={handleSubmit}
        value="Envoyer"
      />

      {/* <button class="g-recaptcha" 
      disabled={"true"}
      onClick={handleSubmit}
      >Envoyer</button> */}

      <div style={{color: color_error_form}} className="form-message">{ error_result }</div>
      </div>
      <div className="chargement" style={{display: chargement}}><div className="chargement_page"><img src={Chargement} alt="" width="50px"/></div></div>

    </form>
    
    </div>
    <Footer />
    </Fragment>
  );
};

export default Contact;