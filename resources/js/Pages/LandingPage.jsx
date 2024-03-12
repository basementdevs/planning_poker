export default function LandingPage() {
    return (
        <div className="flex flex-col items-center justify-center h-screen bg-[#FBFBFE] mx-4">
            <div className="flex flex-col text-[1.2rem] font-bold text-[#DEDCFF] sm:flex-row md:text-[1.5rem] lg:text-[1.8rem]">
                <span className="ml-2">Real time.</span>
                <span className="ml-2">Collaborative.</span>
                <span className="mx-2">Simple story point estimation.</span>
            </div>
            <h1 className="text-[2.5rem] font-bold text-[#2F27CE] mt-[1.2rem] mb-[2.5rem] md:text-[3.5rem] lg:text-[5rem]">
                Planning Poker
            </h1>
            <a
                href={route('login')}
                className="px-[2rem] py-2 text-[#FBFBFE] text-[1rem] bg-[#443DFF] font-bold rounded-full transition hover:bg-[#8480FF] hover:scale-105 md:px-[3rem] md:py-3 md:text-[1.2rem] lg:px-[6.8rem] lg:py-4 lg:text-[1.55rem]"
            >
                Start new game
            </a>
        </div>
    );
}
