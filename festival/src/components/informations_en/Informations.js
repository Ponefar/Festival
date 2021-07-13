import React, { Fragment } from 'react';
import 'react-slideshow-image/dist/styles.css';
import Informations_generales from './Informations_generales';
import Actualites from './Actualites.jsx'
import Navigation from '../navigation_en/Navigation';
import Footer from '../footer_en/Footer'
// import Actualites from './Actualites';


const Informations = () => {

  return (
    <Fragment> 
      <Navigation />
      <div className="information_pratiques_all_all">
        {/* <Msg_important /><br /> */}
        <Informations_generales />
        <Actualites />
      </div>
      <Footer />
    </Fragment> 
  ) 
}

export default Informations;
