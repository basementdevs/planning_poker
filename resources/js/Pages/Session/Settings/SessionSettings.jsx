import Header from "@/Components/Header.jsx";
import {  useState } from 'react';
import trelloImage from '../../../Assets/trelloIcon.png';
import jiraImage from '../../../Assets/jira.webp';
import React from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faTimes } from "@fortawesome/free-solid-svg-icons";
import TrelloSettingsForm from "@/Components/TrelloSettingsForm.jsx";

const SaveSettings = () =>{
    return <div className="underline"> Save</div>
}

const PlatformSettings = ({ platform }) => {
    let PSettingsForms = null

    if (platform === 'trello') {
        PSettingsForms = <TrelloSettingsForm/>
    }else if(platform === 'jira'){
        PSettingsForms = (
            <div className="underline  text-blue-200">
                {platform}
            </div>
        );
    }

    return PSettingsForms?? <SaveSettings/>;
}

const TaskManagerChoice = ()=>{
    const [selectedPlatform, setSelectedPlatform] = useState(null);

    const handlePlatformSelection = (platform) => {
        setSelectedPlatform(platform);

    };

    const platformCardsInformation = [
        {
            name: 'jira',
            image: jiraImage
        },
        {
            name: 'trello',
            image: trelloImage
        },
        {
            name: 'none',
            image: null
        },
    ];

    const Cards = () => {
        return (
            <div className="container mx-auto mt-8">
                <h2 className="text-center mb-8 font-semibold text-4xl pt-40 text-custom-secondary ">Choose your task's manager</h2>

                <div className="flex justify-center gap-40 mt-20">
                    {platformCardsInformation.map((item) => (
                        <div
                            key={item.name}
                            className={`card ${selectedPlatform === item.name && 'selected'}`}
                            onClick={() => handlePlatformSelection(item.name)}
                        >
                            <div className="card-content">
                                {item.image ? (
                                    <img
                                        src={item.image}
                                        alt={item.name}
                                        className="w-16 h-16 mb-4 rounded-full shadow-lg cursor-pointer transform transition-transform hover:scale-105"
                                    />
                                ) : (
                                    <FontAwesomeIcon
                                        icon={faTimes}
                                        className="w-16 h-16 mb-4 rounded-full shadow-lg cursor-pointer transform transition-transform hover:scale-105"
                                    />
                                )}
                                <h3 className="text-xl font-semibold mb-2 text-center text-custom-text">
                                    {item.name.UFirstLetter()}
                                </h3>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        );
    };

    return !selectedPlatform ? <Cards /> : <PlatformSettings platform={selectedPlatform}/>;
};



const Settings = ()=>{
    return <TaskManagerChoice/>
}



export default function PlatformChoose() {
    return (
        <>
            <Header />
            <TaskManagerChoice />
        </>
    );
}
