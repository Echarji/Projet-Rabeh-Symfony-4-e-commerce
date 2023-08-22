pipeline {
    agent any

    stages {
        stage('Increment Version') {
            steps {
                script {
                    def versionFile = 'version.txt'
                    def currentVersion = readFile(versionFile).trim()
                    def versionParts = currentVersion.split('\\.').collect { it.toInteger() }

                    versionParts[2]++ // Increment patch version

                    def newVersion = versionParts.join('.')
                    writeFile file: versionFile, text: newVersion

                    env.IMAGE_NAME = "${newVersion}-${BUILD_NUMBER}"

                    echo "Incremented version: ${currentVersion} -> ${newVersion}"
                    echo "Image name: ${env.IMAGE_NAME}"

                    // Add and commit the updated version file
                    sh "git config --global user.email 'jenkins@example.com'"
                    sh "git config --global user.name 'Jenkins CI'"
                    sh "git add ${versionFile}"
                    sh "git commit -m 'Increment version to ${newVersion}'"
                }
            }
        }
    }

    
}
