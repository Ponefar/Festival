import React, { Fragment } from 'react';
import Navigation from '../navigation/Navigation'
import Footer from '../footer/Footer'

const Billeterie = () => {
    return(
        <Fragment>
            <Navigation />
            <div className="everyAllPageBilleterie">
            <h1 className="partenairesh1">Billeterie </h1>
                <div className="Billeterie_en_ligne">
                    Billeterie en ligne
                </div>
                <table>
                    <tbody>
                    <tr>
                        <td>Dj Snake</td>
                        <td className="prix">35 €</td>
                        <td ><button className="billeterie_btn_page"> Ajouter au panier</button></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Booba</td>
                        <td className="prix">55 €</td>
                        <td ><button className="billeterie_btn_page"> Ajouter au panier</button></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Sofiane</td>
                        <td className="prix">25 €</td>
                        <td ><button className="billeterie_btn_page"> Ajouter au panier</button></td>
                    </tr>
                    </tbody>
                </table>
                <div className="Billeterie_en_ligne">
                    Votre Panier
                </div>
                <br />
                <center>1 x <span className="prix">place</span> Sofiane - 16/08/2021 -  <span className="prix">55 €</span><br /><br />

                <button className="billeterie_btn_page">Étape suivant</button></center>
                </div>
            <Footer />
        </Fragment>

    )
}

export default Billeterie;