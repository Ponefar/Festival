import React, {Fragment} from 'react';
import { Link } from 'react-router-dom';
import Img_Croix from '../../../img/croix.png' 
import Sous_menu from './Sous_menu'
import Remonter from '../Remonter'

const Menu_open = () =>{

    // function Menu_visible(){
    //     (1 == 2 ) ? burger = document.getElementById('rien').style.display = "none" : burger = document.getElementById('rien').style.display = "inline"
    // }        

    return(
        <Fragment>
            <div id="remonter"></div>
            <Remonter />
            <ul className="menu_ul" id="menuopen">

                <img alt="" className="imgCroix" onClick={() => (document.getElementById('menuopen').style.marginLeft = "-80.2%" , document.querySelector('.OnClickMenuFerme').style.height = "0vh") } src={Img_Croix} />

                <Link to="/en">
                    <li className="menu">Home</li>
                </Link>
                <Link to="/Sponsors_en">
                    <li className="menu">Sponsors</li>
                </Link>
                {/* <Link to="/Informations_pratiques">
                    <li className="menu">Informations pratiques</li>
                </Link> */}
                <Link to="/Informations_en">
                    <li className="menu">Information</li>
                </Link>
                <Link to="/Billeterie_page_en">
                    <li className="menu">Ticket office</li>
                </Link>
                <Link to="/Direct_page_en">
                    <li className="menu">Concert in progress</li>
                </Link>
                <Link to="/Programmation_en">
                    <li className="menu">Programming</li>
                </Link>
                <Link to="/Contact_en">
                    <li className="menu">Contact</li>
                </Link>
                <Link to="/Map_en">
                    <li className="menu">Map</li>
                </Link>
                <hr className="hr_menu" />
                
                <div className="sous_menu">
                    <Sous_menu />
                </div>             
            </ul>
        </Fragment>
    )
}

export default Menu_open
