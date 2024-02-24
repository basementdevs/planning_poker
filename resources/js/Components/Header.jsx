import logo from "../Assets/logo.png";
import {Link} from "@inertiajs/react";
export default function Header({children}) {
    return (
        <header className="bg-custom-primary p-4">
            <div className="container mx-auto flex justify-between">
                {/*<img src={logo} alt="Logo" className="w-12 h-12"/>*/}
                <Link href={route('home')} className="cursor-pointer items-center text-white text-2xl font-semibold">
                    Planning Poker
                </Link>
                {children}
            </div>
        </header>
    );
}
