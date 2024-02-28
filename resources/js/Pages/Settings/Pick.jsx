import {  useState } from 'react';
import trelloImage from '../../Assets/trelloIcon.png';
import jiraImage from '../../Assets/jira.webp';
import React from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faTimes } from "@fortawesome/free-solid-svg-icons";
import TrelloSettingsForm from "@/Components/TrelloSettingsForm.jsx";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import ComingSoon from "@/Components/ComingSoon.jsx";
import {Link, router} from "@inertiajs/react";



const TaskManagerChoice = ({platformSettings})=>{
    const [selectedPlatform, setSelectedPlatform] = useState(null);
    const handlePlatformSelection = (platform) => {
        setSelectedPlatform(platform);
    };

    const platformCardsInformation = [
        {
            name: 'jira',
            image: jiraImage,
            route: 'settings-platform.create'
        },
        {
            name: 'trello',
            image: trelloImage,
            route: 'settings-platform.create'
        },
        {
            name: 'none',
            image: null,
            route: 'settings-platform.create'
        },
    ];

    const Cards = () => {
        return (
            <div className="container mx-auto mt-8">
                <h2 className="text-center mb-8 font-semibold text-4xl pt-40 text-custom-secondary ">Choose your task's manager</h2>

                <div className="flex justify-center gap-40 mt-20">
                    {platformCardsInformation.map((item) => (
                        <Link href={route(item.route, {platform: item.name})}>

                            <div
                                key={item.name}
                                className={`card ${selectedPlatform === item.name && 'selected'}`}
                                onClick={()=>handlePlatformSelection (item.name)}
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
                                        {item.name.UFirstLetter ()}
                                    </h3>
                                </div>
                            </div>
                        </Link>
                    ))}
                </div>
            </div>
        );
    };

    return <Cards/>;
};


const Settings = ({ platformSettings })=>{
    return <TaskManagerChoice platformSettings={platformSettings}/>
}


export default function PickPlatform({ auth, platform }) {

    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <TaskManagerChoice platformSettings={auth.platform}/>
        </AuthenticatedLayout>
    );
}
