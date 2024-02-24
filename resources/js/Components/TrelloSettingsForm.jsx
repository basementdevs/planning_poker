import React, { useState } from 'react';
import trelloLogo from '../Assets/trelloIcon.png';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCheck } from "@fortawesome/free-solid-svg-icons";

export default  function TrelloForm () {
    const [apiKey, setApiKey] = useState('');
    const [apiToken, setApiToken] = useState('');

    const handleApiKeyChange = (event) => {
        setApiKey(event.target.value);
    };

    const handleApiTokenChange = (event) => {
        setApiToken(event.target.value);
    };

    const handleSubmit = (event) => {
        event.preventDefault();
        console.log('API Key:', apiKey);
        console.log('API Token:', apiToken);
    };

    return (
        <div className="container mx-auto my-auto mt-20">
            <div className="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
                <img src={trelloLogo} alt="Trello Logo"  className="w-16 h-16  rounded-full mx-auto shadow-lg cursor-pointer transform transition-transform hover:scale-105 " style={{ maxWidth: '100px' }} />
                <form onSubmit={handleSubmit}>
                    <label className="block mb-4">
                        <span className="text-custom">Trello API Key:</span>
                        <input
                            type="text"
                            value={apiKey}
                            onChange={handleApiKeyChange}
                            className="mt-1 p-2 w-full border rounded-md"
                        />
                    </label>
                    <label className="block mb-4">
                        <span className="text-custom">Trello API Token:</span>
                        <input
                            type="text"
                            value={apiToken}
                            onChange={handleApiTokenChange}
                            className="mt-1 p-2 w-full border rounded-md"
                        />
                    </label>
                    <button
                        type="submit"
                        className="bg-custom-primary text-white p-2 rounded-md hover:bg-custom-accent focus:outline-none focus:ring focus:border-custom-accent flex items-center justify-center"
                    >
                        Save

                        <FontAwesomeIcon className="ml-2" icon={faCheck}/>
                    </button>
                </form>
            </div>
        </div>
    );
};

