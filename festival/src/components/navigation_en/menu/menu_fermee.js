import React, {Fragment} from 'react';
import { Link } from 'react-router-dom';
import Burger from '../../../img/burger.png' 
import logo from '../../../img/logo.png'
import flag_fr from '../../../img/flag_fr.svg'

function Menu_fermee(){

    // function Menu_visible(){
    //     (1 == 2 ) ? burger = document.getElementById('rien').style.display = "none" : burger = document.getElementById('rien').style.display = "inline"
    // }

    return(
        <Fragment>
            <div className="menu_fermee">
                <img alt="" className="imgBurger" onClick={() => (document.getElementById('menuopen').style.marginLeft = "0px" ,  document.querySelector('.OnClickMenuFerme').style.height = "100vh") } src={Burger}/>
                <Link to ="/en">
                    <img alt="" className="logo" src={logo} />
                </Link>
                <Link to ="/">
                    <img alt="" className="flag" src={flag_fr} />
                </Link>
            </div>
        </Fragment>
    )
}

export default Menu_fermee
