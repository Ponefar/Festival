import React, { Fragment } from 'react';
import 'react-slideshow-image/dist/styles.css';
import Billeterie from '../billeterie_en/Billeterie';
import Msg_important from './msg_importants/Msg_important'
import Footer from '../footer_en/Footer'
import Navigation from '../navigation_en/Navigation';
import Tete_affiche from './tete_affiche/Tete_affiche'
import Map_accueil from '../map/Map_accueil'

const Accueil = () => {


  return (
    <Fragment> 
      <Navigation />
      {/* <div onClick={() => document.getElementById('menuopen').style.marginLeft = "-80.2%" } > */}
        <Msg_important />
        <Tete_affiche />
        <Billeterie />
        <Map_accueil />
        <Footer />
    </Fragment> 
  ) 
}

export default Accueil;
