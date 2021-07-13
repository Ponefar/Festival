import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';


const Sous_menu = () => {
  
  const [data, setData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      const result = await axios(
        '/memory_admin/controller/reseau_sociaux/reseau_sociaux_api.php',
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
      <ul>
            <Link to ="Informations_pratiques">
                <div className="info_redirect" >Toutes les informations pratiques</div> 
            </Link> 
    </ul>
    <br />

        <div className="flex_reseau_sociaux_menu">
          {data./*filter(name => name.id === 286).*/map((item, key) => (
              // <a onClick={(e) => handleClick(key,e)} key={key} >
                <li className={"article"} key={key}>
                  {/* <Link to="chart" to={item.url_reseau_sociaux}> */}
                  <button className="btn_reseau_sociaux_menu" onClick={()=> window.location= item.url_reseau_sociaux }>
                    <img className="image_reseau_sociaux" src={`data:image/png;base64, ${item.image_reseau_sociaux}`} alt="" />
                  </button> 
                  {/* </Link> */}
                </li>
              // </a>
            ))}
          </div>
    </Fragment> 
  ) 
}

export default Sous_menu;
