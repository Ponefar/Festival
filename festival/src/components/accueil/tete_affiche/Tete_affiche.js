import React, {Fragment, useState, useEffect} from 'react'
import axios from 'axios';


const Tete_affiche = () => {
    const [data, setData] = useState([]);

    useEffect(() => {

        const fetchData = async () => {
        const result = await axios(
        "/memory_admin/controller/tete_affiche/tete_affiche_api.php",
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
            {data./*filter(name => name.id === 286).*/map((item, key) => (

            <div className="artiste_tete_affiche" key={key}>
                <img className="image_tete_affiche" src={`data:image/png;base64, ${item.image_tete_affiche}`} alt=""/>
                <div className="div_opacity_dans_texte"></div>
                <div className="text_sous_artiste_tete_affiche">{ item.nom_artiste_tete_affiche } <br />{ item.date_concert}</div>
            </div>
            ))}
        </Fragment>        
    )   
}

export default Tete_affiche 