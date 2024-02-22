import Header from "@/Components/Header.jsx";
import { useState } from 'react';
import trelloImage from '../Assets/trelloIcon.png';
import  jiraImage from '../Assets/jira.webp';
export default function PlatformChoose() {
    const [selectedPlatform, setSelectedPlatform] = useState(null);

    const handlePlatformSelection = (platform) => {
        setSelectedPlatform(platform);
        console.log(platform)
    };

    return (
        <>
            <Header />
            <div className="container mx-auto mt-8">
                <h2 className="text-center mb-8 font-semibold text-3xl pt-40 text-sky-500">Choose your task's manager</h2>

                <div className="flex justify-center gap-40 mt-20">
                    <div
                        className={`card ${selectedPlatform === 'jira' && 'selected'}`}
                        onClick={()=>handlePlatformSelection ('jira')}
                    >
                        <div className="card-content">
                            <img src={jiraImage} alt="Jira"
                                 className="w-16 h-16 mb-4 rounded-full shadow-lg cursor-pointer transform transition-transform hover:scale-105"/>
                            <h3 className="text-xl font-semibold mb-2 text-center">Jira</h3>
                        </div>
                    </div>

                    <div
                        className={`card ${selectedPlatform === 'trello' && 'selected'}`}
                        onClick={()=>handlePlatformSelection ('trello')}
                    >
                        <div className="card-content">
                            <img src={trelloImage} alt="Trello"
                                 className="w-16 h-16 mb-4 rounded-full shadow-lg cursor-pointer transform transition-transform hover:scale-105"/>
                            <h3 className="text-xl font-semibold mb-2 text-center">Trello</h3>
                        </div>
                    </div>
                    <div
                        className={`card ${selectedPlatform === 'trello' && 'selected'}`}
                        onClick={()=>handlePlatformSelection ('trello')}
                    >
                        <div className="card-content">
                            <img src={trelloImage} alt="Trello"
                                 className="w-16 h-16 mb-4 rounded-full shadow-lg cursor-pointer transform transition-transform hover:scale-105"/>
                            <h3 className="text-xl font-semibold mb-2 text-center">Trello</h3>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
