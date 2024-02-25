


export default  function ComingSoon( {className}) {
    return <div  className={`bg-gradient-to-r from-blue-700 to-purple-500 p-8 rounded-lg shadow-lg text-white ${className}`}>
        <h2 className="text-3xl font-bold mb-4">Coming Soon!</h2>
        <p className="text-lg mb-6">We're thrilled to announce that something amazing is on the way!</p>
        <div className="flex items-center justify-center">
            <p className="text-xl mr-2">Stay tuned for the big reveal!</p>
            <span className="animate-bounce">&#x02190;</span>
        </div>
    </div>

}
