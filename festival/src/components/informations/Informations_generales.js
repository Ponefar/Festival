import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';



const Informations = () => {


    const [data, setData] = useState([]);

    useEffect(() => {

        const fetchData = async () => {
        const result = await axios(
        "/memory_admin/controller/information/information_generales_api.php",
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
        <div className="informations_pratiques_all">
            <h1>Informations Générales</h1>
                {data.map((item, key) => (
                        <li className="informations_generales" key={key}>
                            <ul>
                                <div className="actua">
                                    <li>
                                        <div>{ item.contenu_information_generales}</div>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    // </a>
                    ))}
                {/* </div>
            </ul> */}
        </div>
    </Fragment> 
  ) 
}

export default Informations;
