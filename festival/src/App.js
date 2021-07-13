import React, {Fragment} from 'react';
// import image2 from './img/image2.jpg';
import 'react-slideshow-image/dist/styles.css';
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom';

import Sponsors from './components/sponsors/Sponsors';
import Sponsors_en from './components/sponsors_en/Sponsors';

import Informations_pratiques from './components/informations_pratiques/Informations_pratiques';
import Informations_pratiques_en from './components/informations_pratiques_en/Informations_pratiques';

import Accueil from './components/accueil/Accueil';
import Accueil_en from './components/accueil_en/Accueil';

import Informations from './components/informations/Informations';
import Informations_en from './components/informations_en/Informations';

import Billeterie_page from './components/billeterie/Billeterie_page';
import Billeterie_page_en from './components/billeterie_en/Billeterie_page';

import Direct_page from './components/direct/Direct_page';
import Direct_page_en from './components/direct_en/Direct_page';


import Contact from './components/contact/Contact';
import Contact_en from './components/contact_en/Contact';

import Programmation from './components/programmation/Programmation';
import Programmation_en from './components/programmation_en/Programmation';

import Map from './components/map/Map';
import Map_en from './components/map_en/Map';

import Erreur404 from './components/error_404/Erreur404';


  const Redirection = () => {
    return (
      <Fragment> 
        <Router forceRefresh={true}>
            <Switch>
              <Route path="/" exact component={Accueil} />
              <Route path="/en"  component={Accueil_en} />    


              <Route path="/Sponsors"  component={Sponsors} />
              <Route path="/Sponsors_en"  component={Sponsors_en} />

              
              <Route path="/Informations_pratiques"  component={ Informations_pratiques } />
              <Route path="/Informations_pratiques_en"  component={ Informations_pratiques_en } />


              <Route path="/Informations"  component={ Informations } />
              <Route path="/Informations_en"  component={ Informations_en } />

              <Route path="/Billeterie_page"  component={ Billeterie_page } />
              <Route path="/Billeterie_page_en"  component={ Billeterie_page_en } />
 
              <Route path="/Direct_page"  component={ Direct_page } />             
              <Route path="/Direct_page_en"  component={ Direct_page_en } />              


              <Route path="/Contact"  component={ Contact } />              
              <Route path="/Contact_en"  component={ Contact_en } />              

              <Route path="/Programmation"  component={ Programmation } />    
              <Route path="/Programmation_en"  component={ Programmation_en } />    

              <Route path="/Map"  component={ Map } />   
              <Route path="/Map_en"  component={ Map_en } />   



              <Route path="/"  component={Erreur404} />


              
          </Switch>
        </Router> 
      </Fragment> 
    ) 
  }


export default Redirection;
