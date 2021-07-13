import React, {Fragment, useState, useEffect} from 'react';
import axios from 'axios';

const Reseau_sociaux = () => {
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
      <ul className="image_reseau_sociaux_flex">
      <div className="flex_reseau_sociaux">
          {data./*filter(name => name.id === 286).*/map((item, key) => (
              // <a onClick={(e) => handleClick(key,e)} key={key} >
                <li className={"article"} key={key}>
                  {/* <Link to="chart" to={item.url_reseau_sociaux}> */}
                  <button className="btn_reseau_sociaux_menu" onClick={()=> window.location = item.url_reseau_sociaux }>
                    <img className="image_reseau_sociaux" src={`data:image/png;base64, ${item.image_reseau_sociaux}`} alt="" />
                  </button> 
                  {/* </Link> */}
                </li>
              // </a>
            ))}
          </div>
      </ul>
    </Fragment> 
  ) 
}

export default Reseau_sociaux;
