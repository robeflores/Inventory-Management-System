import React  from 'react';
import axios from 'axios';
import { useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";


export default function Edit () {
    // retrieve state data using useLocation hook
    const {state} = useLocation();

    const [isLoading, setLoading] = useState(true);

    const [inputs, setInputs] = useState({descriptor: "", quantity: 1});
    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs( values => ({...values, [name]: value}) );
    }

    //utilise the useNavigate hook from react router dom to navigate to home after making a successfull request
    const navigate = useNavigate();
    const toHome = () => {
        navigate("/");
    }

    //load data
    if(isLoading){
        async function getItemJSON() {
            const response = await axios.get("http://localhost:8000/api/items/" + state.id );
            return response.data;
        }
        getItemJSON()
            .then((data) => {
                setInputs( {descriptor: data.descriptor, quantity: data.quantity} );
                setLoading(false);
            })
            .catch((err) => console.log(err));
    }

    async function updateItem() {
        const response = await axios.put("http://localhost:8000/api/items/" + state.id, {descriptor: inputs.descriptor, quantity: inputs.quantity} );
        return response.data;
    }
    const handleUpdate = (event) => {
        event.preventDefault();
        updateItem().then((data) => {
            if(data === 200)
                toHome();
        })
        .catch((err) => console.log(err));
    }

    async function deleteItem() {
        const response = await axios.delete("http://localhost:8000/api/items/" + state.id );
        return response.data;
    }
    const handleDelete = () => {
        deleteItem().then((data) => {
            if(data === 204)
                toHome();
        })
        .catch((err) => console.log(err));
    }
    

    
    if (isLoading) {
        return <div className="Home text-center">Loading...</div>;
    }
    return (
        <div className="container" style={{ marginLeft: '44%'}}>
            <form onSubmit={handleUpdate}>
                <h1>edit inventory item:</h1>
                <label>Description: <input type="text" value={inputs.descriptor || ""} name="descriptor" onChange={handleChange} required/></label>
                <br/><label>Quantity: <input type="number" value={inputs.quantity || ""} name="quantity" onChange={handleChange} required/></label>
                <br/><button type="submit" className="btn btn-primary">Apply changes</button>
            </form>
            <button type="button" className="btn btn-danger" style={{marginTop: '5%'}} onClick={()=>handleDelete()}>Delete item</button>
        </div>
    );
}

