import React, {Fragment, useState, useEffect} from 'react';
import Navigation from '../navigation/Navigation';
import Type_rap_prgm from './Type_rap_prgm'
import Footer from '../footer/Footer'



const Programmation = () => {
    return(
        <Fragment>
            <Navigation />
            <Type_rap_prgm />
            {/* <Nom_scene_prgm /> */}
            <Footer />
        </Fragment>
    )
}

export default Programmation