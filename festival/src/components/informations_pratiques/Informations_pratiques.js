import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';
import Navigation from '../navigation/Navigation';
import Footer from '../footer/Footer'



const Informations_pratiques = () => {

    const [data, setData] = useState([]);
    // const [i, setI] = useState("fas fa-angle-down");

    useEffect(() => {

        const fetchData = async () => {
        const result = await axios(
        "/memory_admin/controller/information_faq/information_faq_api.php",
        );
                
        setData(result.data);
        console.log("updated");
        };
        fetchData();
        console.log("mounted");
        
    }, [])
    // const handleClick = (key,e) => {  
    //   e.preventDefault();    
    //   console.log(key);  
    // }


    return (
        <Fragment> 
            <Navigation />
            <div id="msg_info_pratiques"  onClick={()=> document.getElementById("msg_info_pratiques").style.display = "none" }>Cliquez sur les titres pour voir le contenu
                <div className="btn_modile_mode_tablette">J'ai compris</div>
            </div>
            <div className="informations_pratiques__faq_all">
                <h2>INFORMATIONS PRATIQUES & FAQ</h2>
                {/* <ul className="image_reseau_sociaux_flex">
                    <div className="flex_reseau_sociaux"> */}
                    {data./*filter(name => name.id === 286).*/map((item, key) => (
                        // <a onClick={(e) => handleClick(key,e)} key={key} >
                            <li className={"informations"} key={key}>
                            {/* <Link to="chart" to={item.url_reseau_sociaux}> */}
                            {/* <button className="btn_reseau_sociaux" onClick={()=> window.location= item.url_reseau_sociaux }>
                                <img className="image_reseau_sociaux" src={`data:image/png;base64, ${item.image_reseau_sociaux}`} alt="" />
                            </button>  */}

                                <div className="titre_information_faq" onClick={() =>(
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.visibility==="visible" ?
                                        
                                    (document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.visibility="hidden" , 
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.marginTop="-50px",
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.height="0",
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.opacity="0",
                                    document.querySelector('#i_class_name' + key).className = "fas fa-caret-right"
                                    ) : 
                                    
                                    (document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.visibility="visible" ,  
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.marginTop="0px",
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.height="auto",
                                    document.querySelector('.sous_titre_et_contenu_information_faq' + key).style.opacity="1",
                                    document.querySelector('#i_class_name' + key).className = "fas fa-caret-up"

                                    )
                                )}>
                                    <i className={"fas fa-caret-right"} id={`i_class_name${key}`} style={{ marginRight:"10px", fontSize:"24px"}}></i>
                                    {item.titre_information_faq}       
                                </div>

                                <div className={`sous_titre_et_contenu_information_faq${key}`}>
                                    <div className="sous_titre_information_faq">{ item.sous_titre_information_faq}</div>
                                    <div>{ item.contenu_information_faq}</div>
                                </div>
                                <br />
                                <hr />
                            </li>
                            
                    ))}
            </div>
            <Footer />
        </Fragment> 
  ) 
}

export default Informations_pratiques;
