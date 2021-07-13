import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';
import Navigation from '../navigation/Navigation';
import Footer from '../footer/Footer'



const Sponsors = () => {
    const [data, setData] = useState([]);

    useEffect(() => {

        const fetchData = async () => {
        const result = await axios(
        "/memory_admin/controller/sponsor/sponsor_api.php",
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
            <h1 className="partenairesh1">PARTENAIRES </h1>
            
            <p className="titre_partenaires"> Partenaires</p>
                <div className="row_column_grid">
                    {data.filter(name => name.type_sponsors === "partenaires").map((item, key) => (
                            <li className={"article_partenaire"} key={key}>
                                    <img className="image_sponsor" src={`data:image/png;base64, ${item.image_sponsor}`} alt="" />
                            </li>
                    ))}
                </div>


            <p className="titre_partenaires"> Partenaires Officiels</p>
            <div className="row_column_grid">
                {data.filter(name => name.type_sponsors === "partenaires_officiels").map((item, key) => (
                        <li className={"article_partenaire"} key={key}>
                                <img className="image_sponsor" src={`data:image/png;base64, ${item.image_sponsor}`} alt="" />
                        </li>
                ))}
            </div>




            <p className="titre_partenaires"> Partenaires Médias</p>
            <div className="row_column_grid">
                {data.filter(name => name.type_sponsors === "partenaires_medias").map((item, key) => (
                        <li className={"article_partenaire"} key={key}>
                                <img className="image_sponsor" src={`data:image/png;base64, ${item.image_sponsor}`} alt="" />
                        </li>
                ))}
            </div>

                    {/* type_sponsors */}
        <Footer />
    </Fragment> 
  ) 
}

export default Sponsors;
