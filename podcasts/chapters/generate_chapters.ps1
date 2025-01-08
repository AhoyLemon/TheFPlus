# Define the list of files to process
$files = @(
    "fplus_360",
    "fplus_364",
    "fplus_368",
    "fplus_369",
    "fplus_370",
    "fplus_371",
    "fplus_374",
    "fplus_376"
)

# Define the input and output paths
$inputPath = "I:/Sites/TheFPlus/podcasts/chapters"
$outputPath = "I:/Sites/TheFPlus/podcasts/chapters"

# Define the function to convert time format to seconds
function Convert-TimeToSeconds {
    param (
        [string]$time
    )
    $parts = $time -split ':'
    return [int]$parts[0] * 3600 + [int]$parts[1] * 60 + [float]$parts[2]
}

# Define the function to generate JSON from TXT
function Generate-ChaptersJson {
    param (
        [string]$txtFilePath,
        [string]$jsonFilePath
    )

    $chapters = @()
    $lines = Get-Content $txtFilePath

    foreach ($line in $lines) {
        if ($line -match '^(?<time>\d{2}:\d{2}:\d{2}\.\d{3}) (?<title>.+?)( <(?<url>.+)>)?$') {
            $chapter = @{
                startTime = Convert-TimeToSeconds $matches['time']
                title = $matches['title']
            }
            if ($matches['url']) {
                $chapter.url = $matches['url']
            }
            $chapters += $chapter
        }
    }

    $json = @{
        version = "1.0"
        chapters = $chapters
    }

    $json | ConvertTo-Json -Depth 3 | Set-Content $jsonFilePath
}

# Initialize progress bar
$totalFiles = $files.Count
$progress = 0

# Process each file
$createdFiles = @()
foreach ($file in $files) {
    $txtFilePath = "$inputPath/$file.chapters.txt"
    $jsonFilePath = "$outputPath/$file.chapters.json"
    Generate-ChaptersJson -txtFilePath $txtFilePath -jsonFilePath $jsonFilePath
    $createdFiles += $jsonFilePath

    # Update progress bar
    $progress++
    Write-Progress -Activity "Generating JSON files" -Status "$progress of $totalFiles" -PercentComplete (($progress / $totalFiles) * 100)
}

# Summary of created files
Write-Host "Created JSON files:"
$createdFiles | ForEach-Object { Write-Host $_ }
