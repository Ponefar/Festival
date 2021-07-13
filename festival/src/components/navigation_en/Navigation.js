import React, {Fragment} from 'react';
import Menu_open from './menu/Menu_open'
import Menu_fermee from './menu/menu_fermee'

    function Navigation(){

        return(
            <Fragment>
                <div className="OnClickMenuFerme" onClick={() => (document.getElementById('menuopen').style.marginLeft = "-80.2%" , document.querySelector('.OnClickMenuFerme').style.height = "0vh") } ></div>
                <Menu_open />
                <Menu_fermee />
            </Fragment>
        )
    }

    export default Navigation
